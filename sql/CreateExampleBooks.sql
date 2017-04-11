# noinspection SqlResolveForFile

USE webdev;
DELETE FROM books;

INSERT INTO books
    VALUES(1,"Harry Potter and the Chamber of Secrets", "J.K. Rowling", "0439064872", "Children,Fantasy", NULL),
      (2,"A Feast of Crows", "George R.R. Martin", "055358202X", "Fantasy", NULL),
      (3,"A Dance with Dragons", "George R.R. Martin", "0553841122", "Fantasy", NULL),
      (4,"A Game of Thrones", "George R.R. Martin", "0553573403", "Fantasy", NULL),
      (5,"Das Kaenguru-Manifest", "Marc-Uwe Kling", "3548373836", "Humour,Political", NULL),
      (6,"Relativity: The Special and the General Theory", "Albert Einstein", "1891396307", "Science,Education", NULL),
      (7,"Eine Billion Dollar", "Andreas Eschbach", "3404150406", "Thriller,Fantasy", NULL),
      (8,"The Call of Cthulhu", "H.P. Lovecraft", "1500584339", "Horror,Fantasy", NULL),
      (9,"Paperback Oxford English Dictionary", "Oxford Dictionaries", "0199640947", "Education", NULL),
      (10,"Gone Girl: A Novel", "Gillian Flynn", "0385347774", "Mystery,Thriller", NULL),
      (11,"How To Win Friends And Influence People", "Dale Carnegie", "1439199191", "Business", NULL ),
      (12,"The 4-Hour Workweek", "Timothy Ferriss", "0307465357", "Business", NULL),
      (13,"Sapiens: A Brief History of Humankind", "Yuval Noah Harari", "0099590085", "History,Education", NULL),
      (14, "Java ist auch eine Insel", "Christian Ullenboom", "3836241196", "Education", NULL),
      (15, "Harry Potter and the Philosopher's Stone", "J.K. Rowling", "1408855658", "Children,Fantasy", NULL ),
      (16, "The Lord of the Rings", "J.R.R. Tolkien", "0007525540", "Fantasy", NULL ),
      (17, "Burnt Paper Sky", "Gilly Macmillan", "0349406391", "Mystery,Thriller", NULL),
      (18, "The Da Vinci Code", "Dan Brown", "0307474275", "Mystery,Thriller", NULL ),
      (19, "The Dictator's Handbook: Why Bad Behavior is Almost Always Good Politics", "Bruce Bueno de Mesquita", "1610391845", "History,Education", NULL ),
      (20, "The Hitchhiker's Guide to the Galaxy", "Douglas Adams", "0345391802", "Fantasy,Humour", NULL );