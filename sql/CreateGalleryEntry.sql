
USE webdev;
DELETE FROM gallery;
DELETE From images;
DELETE From galleryimages;

INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(1, 'jpg', 'harry-potter-and-the-chamber-of-secrets', 'Testimage' ,'');
INSERT INTO gallery (GalleryID, Name, State) VALUES(1, 'Testgallery', 0);
INSERT INTO galleryimages (GalleryID, ImageID) VALUES(1, 1);

INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(2, 'jpg', 'library-5', 'Library' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(3, 'jpg', 'class-steel-installation', 'Class Steel Installation' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(4, 'jpg', 'ArchitectureArtDesigns-180', 'Architecture Art Designs' ,'');