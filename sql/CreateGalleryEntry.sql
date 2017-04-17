USE webdev;
DELETE FROM gallery;

INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(1, 'jpg', 'harry-potter-and-the-chamber-of-secrets', 'Testimage' ,'');
INSERT INTO gallery (GalleryID, Name) VALUES(1, 'Testgallery');
INSERT INTO galleryimages (GalleryID, ImageID) VALUES(1, 1);


INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(2, 'jpg', 'library-5', 'Library' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(3, 'jpg', 'class-steel-installation', 'Class Steel Installation' ,'');
INSERT INTO images (ImageID, Type, PictureRef, Name, Caption) VALUES(4, 'jpg', 'ArchitectureArtDesigns-180', 'Architecture Art Designs' ,'');
