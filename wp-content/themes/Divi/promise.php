<?php
// WP Post Template: Promise
get_header();
?>

<?php

function seo_title($title) {
    $title = "asdasd";
    return $title;
}

$central_template = "Narendra Modi led @Bhartiya Janta Party government" . get_post_meta($post->ID, "status", true) . "on their promise of " . get_post_meta($post->ID, "title", true);

function promise_seo_title($title) {
    $title = $central_template;
    return $title;
}

function promise_seo_description($content) {
    ob_start();
    the_content();
    $content = ob_get_clean();
    return $content;
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<section id="promise">
    <?php
    $parent = $wp_query->query['govt_type'];
    $parent_page_id = get_page_by_path('governments/' . $parent)->ID;

    $party_name = get_post_meta($parent_page_id, 'party_name', true);
    //$party_link = the_permalink($parent_page_id);
    $party_link = esc_url(apply_filters('the_permalink', get_permalink($parent_page_id), $parent_page_id));
    ?>
    <div class="container" class="article_title">
        <div class="government_page_link_container">
            <a class="government_page_link_button" href="<?php echo the_permalink($parent_page_id) ?>">Show me all promises of <?php echo $party_name ?> Government</a>
        </div>
        <div id="promise_category">
            <?php
            echo get_post_meta($post->ID, "category", true);
            //echo $govt;
            //echo promise_seo_title()
            //print_r($wp_query);
            ?>
        </div>
        <h1 id="promise-description">
            <?php
            echo the_title();
            ?>
        </h1>
    </div>
</section>

<section id="promise_status">
    <div class="container" class="article_title">
        <?php
        $status = get_post_meta($post->ID, "status", true);

        switch ($status) {
            case 'Fulfilled':
                $status_class = "fa fa-check-circle-o fa-fw";
                $status_content = '"\f05d"';
                $status_color = "rgba(67, 207, 8, 0.62)";
                break;
            case 'Adequate Progress':
                $status_class = "fa fa-cogs fa-fw";
                $status_content = '"\f085"';
                $status_color = "rgb(153, 204, 237)";
                break;
            case 'Inadequate Progress':
                $status_class = "fa fa-cog fa-fw";
                $status_content = '"\f085"';
                $status_color = "rgba(141, 153, 161, 0.63)";
                break;
            case 'Stalled':
                $status_class = "fa fa-handshake-o fa-fw";
                $status_content = '"\f2b5"';
                $status_color = "rgba(246, 187, 55, 0.73)";
                break;
            case 'Broken':
                $status_class = "fa fa-ban fa-fw";
                $status_content = '"\f05e"';
                $status_color = "rgba(219, 96, 93, 0.82)";
                break;
            default :
                $status_class = "fa fa-hourglass-start fa-fw";
                $status_content = '"\f251"';
                $status_color = "rgba(182, 46, 194, 0.45)";
        }
        ?>

        <h2 id="promise_status_value">
            <i aria-hidden="true" id="promise_status_symbol" class="<?php echo $status_class; ?>"></i>
            <?php
            echo $status;
            ?>
        </h2>
    </div>
</section>
<div class="container">
    <div id="content-area" class="clearfix">
        <div id="left-area">
            <div id="share-buttons" class="text-center">
                <?php
                $url = get_permalink($post->ID);
                ?>
                <ul class="list-inline">
                    <li>

                        <a href="<?php echo 'https://www.facebook.com/sharer.php?u=' . $url; ?>" target="_blank" style="color:#3b5998 ;">
                            <i class="fa fa-2x fa-facebook-square"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo 'https://plus.google.com/share?url=' . $url; ?>" target="_blank" style="color:#dd4b39 ;">
                            <i class="fa fa-2x fa-google-plus"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo 'https://twitter.com/share?url=' . $url; ?>" target="_blank" style="color:#1da1f2 ;">
                            <i class="fa fa-2x fa-twitter"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div id="promise_content">
                <?php
                $content_post = get_post($post->ID);
                $content = $content_post->post_content;
                $content = apply_filters('the_content', $content);
                $content = str_replace(']]>', ']]&gt;', $content);
                echo $content;
                ?>
            </div>
            <div>
                <?php
                if (( comments_open() || get_comments_number() ) && 'on' == et_get_option('divi_show_postcomments', 'on')) {
                    comments_template('', true);
                }
                ?>
            </div>
        </div>
    </div>
</div>

<style>
    .government_page_link_container {
        text-align: right;
        position: absolute;
        top: -30px;
        right: 0px;
    }
    .government_page_link_button {
        background-color: transparent;
        color: #2ea3f2;
        font-weight: normal;
        box-shadow: none;
        border: solid 1px #2ea3f2;
        padding: 9px 24px;
    }
    .government_page_link_button:hover {
        background-color: #1e73be;
        color: #ffffff;
        border: none;
    }
    #promise_content p {
        background-color: #f7f7f7;
        font-family: Lato, sans-serif;
        font-size: 1.25em;
        line-height: 1.5;
        margin-bottom: 1em;
        padding: .25em .5em;
    }

    #promise_content {
        border-left: .3em solid;
        border-left-color: <?php echo $status_color; ?>;
    }

    #promise_status_symbol {
        content : <?php echo $status_content; ?>;
    }

    #promise {
        background-color: #e9ebee;
        background-image: radial-gradient(circle at top right, #e9ebee, white);
        background-attachment: fixed;
        border-bottom: .1rem solid #ddd;
    }

    #promise_status_value {
        color : #fff;
        padding-top: 10px;
    }

    #promise_status {
        background:  <?php echo $status_color; ?>;
        background-attachment: fixed;
        border-bottom: .1rem solid #ddd;
    }

    #promise_category{
        font-size: 1.4em;
    }

    #promise-description {
        font-size: 1.8em;
        margin: 1rem auto 1rem;
        text-shadow: 0.05em 0.05em rgba(0, 0, 0, 0.13);
    }

    .container {
        margin-left: auto;
        margin-right: auto;
        padding-left: 1.4rem;
        padding-right: 1.4rem;
        position: relative;
    }

    .article_title {
        font-family: Lato, sans-serif;
        font-size: 2.5em;
    }
    #left-area{
        float: left;
        margin: 2rem 0 4rem;
        padding-left: .75em;
        padding-right: 5.5%;
    }
</style>

<?php get_footer(); ?>
