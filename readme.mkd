


Thurston is a child theme for the [Toolbox][] theme by Automattic. It
contains some modifications I wanted for my site.

[Toolbox]: http://wordpress.org/extend/themes/toolbox



## comments.php ##

The comment permalink and timestamp have been shifted a bit. There's no
commenter avatar. The list of comments looks less like a list.



## content-single.php ##

I don't like the way tags look at the bottom of posts (and tag posts
inconsistently), so I removed them from the post template. You can
restore them by just removing this file. 



## content.php ##

More tag-display removal.



## header.php ##

The navigation menu was moved above the site title and description.
Again, personal preference; delete header.php to get the default
positioning.



## single.php ##

Removed the navigation links to next and previous posts. Delete
single.php to get them back.


## style.css ##

I narrowed the site width, switched sans-serif fonts, and made the font
size in widgets a bit smaller. Also the style declarations to finish off
the changes in comments.
