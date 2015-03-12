# framework

Bare bones MVC framework. In Deck`s structure, instead of grouping models and controllers together, the whole of the module is contained in the same folder. So a blog module would have the files:

- Post.php / extends AbstractModel
- PostRepository.php / (extends AbstractSqlRepository)
- PostSchema.php / (extends Schema)
- PostForm.php / (extends Form)
- PostController.php / (extends AbstractController)

in the Modules/Blog folder.

