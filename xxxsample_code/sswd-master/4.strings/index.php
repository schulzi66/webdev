<?php
include('db/config.php');

class NewsItem {
	public $source = "";
	public $title = "";
	public $link = "";
	public $description = "";

	public function __construct($s) {
		$this->source = $s;
	}

	public function __toString() {
		return "[source]".$this->source."  [title]".$this->title."  [link]".$this->link."  [description]".$this->description;
	}

	public function save() {
		global $conn;

		$sql = "INSERT INTO news 
					(created_at, source, title, link, description)
				VALUES 
					(NOW(), '$this->source', '$this->title', '$this->link', '$this->description')";

		// because the link column in the database has a unique property 
		// this code will fail for articles that are already saved
		try {
			$conn->query($sql);	
		}
		catch(Exception $e) {}
		
	}
}

function getXML($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$op = curl_exec ($ch);
	curl_close ($ch);
	return $op;
}

function extractData($str, $n1, $n2) {
	$s = strpos($str, $n1) + strlen($n1);
	$e = strpos($str, $n2);
	return substr($str, $s, $e - $s);
}

$articles = array();
$sources = array(	"rte" => "http://www.rte.ie/news/rss/news.xml",
					"bbc" => "http://feeds.bbci.co.uk/news/rss.xml");

foreach ($sources as $source => $feed) {
	
	// get the raw data
	$xml = getXML($feed);
	$arr = explode("<item>", $xml);

	// extract the specific pieces of data
	for ($i=1 ; $i<count($arr) ; $i++) {
		$temp = new NewsItem($source);
		$temp->title = extractData($arr[$i], "<title>", "</title>");
		$temp->link = extractData($arr[$i], "<link>", "</link>");
		$temp->description = extractData($arr[$i], "<description>", "</description>");
		$temp->save();
		$articles[] = $temp;
	}
}

$sql = "SELECT * FROM news";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo '<table border="1">';
    echo '<caption>News Articles</caption>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Published</th>';
    echo '<th>Source</th>';
    echo '<th>Title</th>';    
    echo '<th>Description</th>';
    echo '<th>Link</th>';
    echo '</thead>';
    echo '<tbody>';
    while($row = $result->fetch_assoc()) {
    	echo '<tr>';
    	echo '<td>'.$row["id"].'</td>';
        echo '<td>'.$row["created_at"].'</td>';
        echo '<td>'.$row["source"].'</td>';
    	echo '<td>'.$row["title"].'</td>';    	
    	echo '<td>'.$row["description"].'&nbsp;</td>';
        echo '<td><a href="'.$row['link'].'">'.$row['link'].'</a></td>';
    	echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}
