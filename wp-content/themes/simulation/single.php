<?php get_header( );?>

<article class="container" id="post-<?php the_ID();?>" <?php post_class();?>>
    <?php if(have_posts()):
             while(have_posts()):
                the_post();
    ?>    
    <div class="jumbotron">
        <h2 class="text-center bg-secondary"><a class="text-decoration-none text-warning"href="<?php esc_url(get_permalink());?>"><?php the_title();?></a></h2>
        <small class=""><?php the_time('F j, Y');?> at <?php the_time('g:i a');?> in <?php the_category();?></small>
        <p><?php the_tags();?> <?php edit_post_link()?></p>
    </div>
    <div class="row">
        <div class="col">
            <?php if(has_post_thumbnail()){
                the_post_thumbnail('');
            }?>
        </div>
    </div>
    <div class="row">
        <?php the_content();?>
    </div>
    <?php endwhile; ?>
            <!--Pagination Start -->
            <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-around">
                <li class="page-item">
                    <div class="page-link"><?php previous_post_link();?></div>
                </li>
                
                <li class="page-item">
                    <div class="page-link"><?php next_post_link();?></div>
                </li>
            </ul>
            </nav>
        <!--Pagination Ends -->
            <?php else:?> <!--End while loop -->
           <p> <?php _e('No Posts To Display');?> </p>
     <?php endif;?> <!--End if statement -->
     <!-- // If comments are open or we have at least one comment, load up the comment template. -->
    <div id="comments" class="bg-light">
        <?php 
            if(comments_open() || get_comments_number()){
                comments_template('', true); 
            }else{
                echo '<h5 class="text-center">Sorry, Comments are closed!</h5>';
            }
        ?>
    </div>
</article>
<?php get_footer();?>