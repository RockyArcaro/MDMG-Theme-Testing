<?php
/**
 * Template Name: Events Single Post
 * This template is used to display single posts of the 'events' custom post type.
 */
?>

<?php
/**
 * Template for displaying single events
 * 
 * This template can be used for custom post type 'event'
 * or can be used with regular posts with category 'events'
 * 
 * @package WordPress
 * @subpackage Music_Theme
 */

get_header(); ?>

<div class="event-single-page">
    <div class="back-button">
        <a href="javascript:void(0);" onclick="goBack();" class="back-link">
            <img  src="<?php echo get_template_directory_uri(); ?>/images/back.png" alt="Back Button">
        </a>
    </div>

    <div class="event-container">
        <?php 
        // 检查是否是演示事件
        $is_demo = false;
        
        if ($is_demo) : 
            // 显示演示事件内容
        ?>
            <div class="event-header">
                <div class="event-featured-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/events/event1.png" alt="The Lounge at World Cafe Live">
                </div>
                
                <div class="event-details">
                    <h1 class="event-title">The Lounge at World Cafe Live</h1>
                    
                    <div class="event-meta">
                        <p class="event-promoter">promoter name</p>
                        <p class="event-artist">Artist Name</p>
                        <p class="event-tour">tour name</p>
                        <p class="event-time">doors: 7:00 PM, show: 8:00 PM</p>
                        <p class="event-price">ticket price</p>
                    </div>
                    
                    <a href="#" class="buy-tickets-button">BUY TICKETS</a>
                </div>
            </div>
            
            <div class="event-content-wrapper">
                <div class="event-content-columns">
                    <div class="artist-info">
                        
                        <div class="artist-image" style="display:flex;flex-direction:column;align-items:center">
                        <h2>ARTIST INFO</h2>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/events/author.png" alt="Artist Image">
                        </div>
                    </div>
                    <div style="border-left:1px solid rgb(159,159,159);height:290px;margin-right:65px"></div>
                    <div class="venue-info">
                       
                        <div style="gap:20px;display: flex; justify-content: space-between;align-items: center;">
                            <div class="venue-map" style="display: flex;flex-direction: column;align-items: center;">
                            <h2>LOCATION</h2>
                                <img width="350px" src="<?php echo get_template_directory_uri(); ?>/images/events/address.png" alt="Venue Map" class="map-image">
                            </div>
                            
                            <div class="venue-address">
                                <p class="venue-name">Ardmore Music Hall</p>
                                <p>23 E Lancaster Ave,</p>
                                <p>Ardmore, PA 19003</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
        else :
            // 显示真实事件内容
            while (have_posts()) : the_post(); 
                
                // 获取事件元数据
                $title = get_field('title');
                $event_promoter = get_field('promoter_name');
                $event_artist = get_field('artist_name');
                $event_tour = get_field('tour_name');
                $event_doors = get_field('doors');
                $event_show = get_field('shows');
                $event_price = get_field('price');
                $event_location_name = get_field('location');
                $event_address = get_field('address');
                $artist_picture = get_field('artist_picture');
                $address_picture = get_field('address_picture');
                $tour_name = get_field('tour_name');
                $cover = get_field('cover');
        ?>
            <div class="event-header">
                <div class="event-featured-image">
                    <img src="<?php echo $cover; ?>" alt="Event Image">
                </div>
                
                <div class="event-details">
                    <h1 class="event-title"><?php echo $title; ?></h1>
                    <div class="event-meta">
                        <p class="event-promoter"><?php echo $event_promoter ? esc_html($event_promoter) : 'promoter name'; ?></p>
                        <p class="event-artist"><?php echo $event_artist ? esc_html($event_artist) : 'Artist Name'; ?></p>
                        <p class="event-tour"><?php echo $tour_name ? esc_html($event_tour) : 'tour name'; ?></p>
                        <p class="event-time">AG Doors: <?php echo $event_doors ? esc_html($event_doors) : '7:00 PM'; ?>, Show: <?php echo $event_show ? esc_html($event_show) : '8:00 PM'; ?></p>
                        <p class="event-price">$ <?php echo $event_price ? esc_html($event_price) : 'ticket price'; ?></p>
                    </div>
                    
                    <a href="#" class="buy-tickets-button">BUY TICKETS</a>
                </div>
            </div>
            
            <div class="event-content-wrapper">
                <div class="event-content-columns">
                    <div class="artist-info">
                        
                        <div class="artist-image" style="display:flex;flex-direction:column;align-items:center">
                        <h2>ARTIST INFO</h2>
                            <img src="<?php echo $artist_picture; ?>" alt="Artist Image">
                        </div>
                    </div>
                    <div style="border-left:1px solid rgb(159,159,159);height:290px;margin-right:65px"></div>
                    <div class="venue-info">
                       
                        <div style="gap:20px;display: flex; justify-content: space-between;align-items: center;">
                            <div class="venue-map" style="display: flex;flex-direction: column;align-items: center;">
                            <h2>LOCATION</h2>
                                <img width="350px" src="<?php echo $address_picture; ?>" alt="Venue Map" class="map-image">
                            </div>
                            
                            <div class="venue-address">
                                <p class="venue-name"><?php echo $event_location_name; ?></p>
                                <p><?php echo $event_address; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
            endwhile;
        endif; 
        ?>
    </div>
</div>

<script>
    // 返回上一页函数
    function goBack() {
        var prevPageUrl = sessionStorage.getItem('prevPageUrl');
        
        // 检查是否存在上一页URL
        if (prevPageUrl) {
            // 检查是否是从日历视图进入的
            var isFromCalendar = sessionStorage.getItem('calendarView') === '1';
            
            // 如果是从日历视图进入，添加参数确保返回时显示日历
            if (isFromCalendar) {
                var separator = prevPageUrl.indexOf('?') !== -1 ? '&' : '?';
                prevPageUrl += separator + 'calendar=1';
            }
            
            window.location.href = prevPageUrl;
        } else {
            // 默认返回事件页面
            window.location.href = '<?php echo esc_url(home_url('/events/')); ?>';
        }
    }

    // 保存当前视图状态，用于后续返回
    document.addEventListener('DOMContentLoaded', function() {
        // 这里可以添加其他页面加载时需要执行的代码
    });
</script>

<style>
    /* Single Event Page Styles */
    .event-single-page {
        padding: 20px;
        position: relative;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    /* Back Button */
    .back-button {
        position: absolute;
        left: 20px;
        top: 20px;
        z-index: 10;
    }
    
    .back-link {
        /* display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background-color: rgba(255, 255, 255, 0.8);
        color: #373e53;
        border-radius: 50%;
        text-decoration: none;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        cursor: pointer; */
    }
    
    .back-link:hover {
        /* background-color: white;
        transform: scale(1.1); */
    }
    
    /* Event Header */
    .event-header {
        display: flex;
        margin-bottom: 40px;
        /* background-color: #373e53; */
        /* color: white; */
        border-radius: 5px;
        overflow: hidden;
        margin-top: 100px;
    }
    
    .event-featured-image {
        width: 50%;
        max-height: 400px;
        overflow: hidden;
    }
    
    .event-featured-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .event-details {
        padding: 30px 30px 0px;
        padding-top: 0px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .event-title {
        font-size: 32px;
        margin-top: 0;
        margin-bottom: 20px;
    }
    
    .event-meta {
        margin-bottom: 30px;
        flex: 1;
        
    }
    
    .event-meta p {
        margin: 16px 0;
        font-size: 16px;
    }
    
    .event-promoter, .event-artist, .event-tour, .event-price {
        opacity: 0.9;
    }
    
    .event-artist {
        font-size: 18px;
        font-weight: bold;
    }
    
    .buy-tickets-button {
        display: inline-block;
        background-color: rgb(55,62,83);
        color: white;
        padding: 25px 30px;
        width: 100%;
        text-decoration: none;
        /* border-radius: 4px; */
        /* font-weight: bold; */
        font-size: 23px;
        text-align: center;
        transition: all 0.3s ease;
        align-self: flex-start;
    }
    
    .buy-tickets-button:hover {
        background-color: #ff5bb0;
        color: white;
    }
    
    /* Event Content */
    .event-content-wrapper {
        padding: 20px 0;
    }
    
    .event-content-columns {
        display: flex;
        gap: 40px;
        justify-content: space-between;
        align-items:center
    }
    
    .artist-info, .venue-info {
        flex: 1;
    }
    
    .artist-info h2, .venue-info h2 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #373e53;
        padding-bottom: 10px;
        /* border-bottom: 2px solid #373e53; */
        text-align: center;
    }
    
    .artist-image, .venue-map {
        margin-bottom: 20px;
        border-radius: 5px;
        overflow: hidden;
    }
    
    .artist-image img, .map-image {
        height: auto;
        display: block;
        width:350px;
    }
    
    .artist-description {
        font-size: 16px;
        line-height: 1.6;
        color: #333;
    }
    
    .venue-address {
        font-size: 16px;
        line-height: 1.6;
        color: #333;
        text-align: center;
    }
    
    .venue-name {
        font-weight: bold;
    }
    
    /* 响应式 */
    @media (max-width: 768px) {
        .event-header {
            flex-direction: column;
        }
        
        .event-featured-image {
            width: 100%;
            max-height: 250px;
        }
        
        .event-content-columns {
            flex-direction: column;
        }
        
        .buy-tickets-button {
            width: 100%;
        }
    }
</style>

<?php get_footer(); ?> 