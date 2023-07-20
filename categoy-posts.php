<?php
include 'partials/header.php';
?>


<header class="category__title">
    <h2>Category Title</h2>
</header>
    <!-------------------------------END OF CATEGORY TITLE---------------------------->


<section class="posts">
    <div class="container posts__container">
        <article class="post">
            <div class="post__thumbnail">
                <img src="./images/blog2.jpg">
            </div>
                <div class="post__info">
                    <a href="" class="category__button">Art</a>
                    <h3 class="post__title"><a href="post.php">Why the obsession with macarons?</a></h3>
                    <p class="post__body">
                        I think they're fairly tasty, but I definitely think the only reason they're 
                        so popular is because of their difficulty
                    </p>
                    <div class="post__author">
                        <div class="post__author-avatar">
                            <img src="./images/avatar3.jpg" alt="">
                        </div>
                        <div class="post__author-info">
                            <h5>Author name2</h5>
                            <small>December 13th, 2021</small>
                        </div>
                    </div>
                </div>
        </article>
        <article class="post">
            <div class="post__thumbnail">
                <img src="./images/blog3.jpg">
            </div>
                <div class="post__info">
                    <a href="" class="category__button">Wildlife</a>
                    <h3 class="post__title"><a href="post.php">Bright blooms that glow</a></h3>
                    <p class="post__body">
                        Certain flowers fluoresce, giving off a spooky light. It's just science!
                    </p>
                    <div class="post__author">
                        <div class="post__author-avatar">
                            <img src="./images/avatar3.jpg" alt="">
                        </div>
                        <div class="post__author-info">
                            <h5>Author name2</h5>
                            <small>December 13th, 2021</small>
                        </div>
                    </div>
                </div>
        </article>
        <article class="post">
            <div class="post__thumbnail">
                <img src="./images/blog4.jpg">
            </div>
                <div class="post__info">
                    <a href="" class="category__button">Wildlife</a>
                    <h3 class="post__title"><a href="post.php">Scented candles improve your mood</a></h3>
                    <p class="post__body">
                        The smell of the scented candle stimulates the part of your brain which
                         is connected to memory and mood. From boosting energy through to relieving stress 
                         or even enhancing mental clarity
                    </p>
                    <div class="post__author">
                        <div class="post__author-avatar">
                            <img src="./images/avatar3.jpg" alt="">
                        </div>
                        <div class="post__author-info">
                            <h5>Author name2</h5>
                            <small>December 13th, 2021</small>
                        </div>
                    </div>
                </div>
        </article>
        
    </div>
</section>


<!-------------------------------END OF POSTS----------------------------->





<section class="category__buttons">
    <div class="container category__buttons-container">
        <a href="" class="category__button">Food</a>
        <a href="" class="category__button">Wildlife</a>
        <a href="" class="category__button">Art</a>
        <a href="" class="category__button">Science</a>
        <a href="" class="category__button">Music</a>
    </div>
</section>
<!-------------------------------END OF CATEGORY BUTTONS----------------------------->
<?php
include 'partials/footer.php';
?>