<?php
$logo = get_field('logo_alt', 'option');
if(!empty($logo)){
    $logo = wp_get_original_image_path($logo);
    $logo = file_get_contents($logo);
}
$thumbnail = get_the_post_thumbnail(null,'medium');
$thumbnail_class = empty($thumbnail) ? 'post-preview__thumbnail_empty' : '';
?>

<article class="post-preview_full">
    <a class="post-preview__thumbnail" href="<?php the_permalink(); ?>">
        <?php echo (!empty($thumbnail) ? $thumbnail : $logo); ?>
    </a>

    <div class="post-preview-content">
        <a class="post-preview__title" href="<?php the_permalink(); ?>">
            <?php the_title() ?>
        </a>

        <?php if(!empty(get_the_excerpt())) echo '<div class="post-preview__excerpt">' . get_the_excerpt() . '</div>' ?>
    </div>

    <div class="post-preview-link">
        <a href="<?php the_permalink(); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                <g clip-path="url(#clip0_490_1490)">
                    <path d="M40.0293 20.3932C40.7364 20.3933 41.4145 20.6742 41.9145 21.1742C42.4145 21.6742 42.6954 22.3523 42.6955 23.0595L42.6955 40.03C42.6954 40.7371 42.4145 41.4152 41.9145 41.9152C41.4145 42.4152 40.7364 42.6962 40.0293 42.6963L23.0587 42.6963C22.3596 42.6841 21.6932 42.3979 21.2031 41.8992C20.713 41.4005 20.4384 40.7292 20.4384 40.03C20.4384 39.3308 20.713 38.6596 21.2031 38.1609C21.6932 37.6622 22.3596 37.3759 23.0587 37.3638L33.4296 37.2016L15.5162 19.2882C15.0161 18.7881 14.7352 18.1098 14.7352 17.4026C14.7352 16.6954 15.0161 16.0171 15.5162 15.517C16.0163 15.0169 16.6946 14.7359 17.4018 14.7359C18.1091 14.7359 18.7874 15.0169 19.2875 15.517L37.2008 33.4304L37.363 23.0595C37.3631 22.3523 37.644 21.6742 38.144 21.1742C38.644 20.6742 39.3222 20.3933 40.0293 20.3932Z" fill="#26697D"/>
                </g>
                <defs>
                    <clipPath id="clip0_490_1490">
                        <rect width="40" height="40" fill="white" transform="translate(28.7148 0.431641) rotate(45)"/>
                    </clipPath>
                </defs>
            </svg>
        </a>
    </div>
</article>
