
<div class="flex flex-col gap-16 mb-16">
    <div class="">
        <div class="hero-section">
            <div class="hero-flex-1 hero-texts">
                <div class="flex flex-col gap-8">
                    <h1 class="name-hero "><?= $vars['name'] ?></h1>
                    <span class="title-hero"><?= $vars['user-title'] ?></span>
                    <p class="text"><?= $vars['bio'] ?></p>
                    <span class="hero-cta">
                        <a href="#" onclick="handleBookMePopUp()">
                            <span class="hero-cta-btn hero-cta-btn-book-me primary-bg-color"><?= $vars['cta'] ?></span>
                        </a>
                        <!-- <a href="#" onclick="handleQuestionMePopUp()">
                            <span class="hero-cta-btn hero-cta-btn-question-me bordered-links">Ask me a question</span>
                        </a> -->
                    </span>
                </div>
            </div>
            <!-- Hero image -->
            <div class="hero-flex-1 hero-pic">
                <div class="hero-profile-picture">
                    <img
                        src="/wp-content/uploads/profile-picture.jpg"
                        alt="<?= $vars['name'] ?>"
                        srcset=""
                        style="width: 100%; height: 100%; object-position: center; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>
