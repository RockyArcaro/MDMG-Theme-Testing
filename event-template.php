<?php
/*Template Name: Event Template*/
?>
<?php get_header(); ?>

<div class="events-page">
     <!-- <?php
        $args = array(
            'post_type' => 'events', // 自定义文章类型名称
            'posts_per_page' => -1 // 显示所有文章，可根据需求调整数量
        );
        // 创建WP_Query对象
$custom_query = new WP_Query($args);
// 检查是否有文章
if ($custom_query->have_posts()) :
    while ($custom_query->have_posts()) : $custom_query->the_post();
        // 显示文章标题
        the_title('<h2><a href="' . get_permalink() . '">', '</a></h2>');
        // 获取并显示副标题自定义字段内容
        $subtitle = get_field('subtitle'); // 'subtitle' 是自定义字段的名称
        if ($subtitle) {
            echo '<h3>' . $subtitle . '</h3>';
        }
        // 显示文章摘要
        the_excerpt();
        // 添加按钮，点击跳转到文章详情页
        echo '<a href="' . get_permalink() . '" class="btn">查看详情</a>';
    endwhile;
    // 重置查询
    wp_reset_postdata();
else :
    echo '没有找到相关文章。';
endif;
    ?> -->



    <div class="follow-us-button">
        <img width="90px" height="90px" src="<?php echo get_template_directory_uri(); ?>/images/follow.png" alt="">
    </div>

    <div class="events-container">
        <h1 class="page-title">Upcoming Events</h1>
        
        <!-- 活动展示区域 -->
        <div class="featured-events">
           
                <!-- 如果没有事件，显示默认事件 -->
                <div class="event-card">
                    <div class="event-date">Thur, Feb 13</div>
                    <div class="event-details">
                        <h3 class="event-title">The Lounge at World Cafe Live</h3>
                    </div>
                </div>
                <div class="event-card">
                    <div class="event-date">Thur, Feb 13</div>
                    <div class="event-details">
                        <h3 class="event-title">The Lounge at World Cafe Live</h3>
                    </div>
                </div>
        </div>
        
        <!-- 标签切换区域 -->
        <div class="events-tabs">
            <a href="#all-events" class="tab" id="all-events-tab">All Events</a>
            <a href="#events-calendar" class="tab" id="events-calendar-tab">Events Calendar</a>
        </div>
        
        <!-- 全部活动列表 -->
        <div class="tab-content" id="all-events-content">
            
                <?php

                    $args = array(
                        'post_type' => 'events', // 自定义文章类型名称
                        'posts_per_page' => -1 // 显示所有文章，可根据需求调整数量
                    );
                    // 创建WP_Query对象
                     $custom_query = new WP_Query($args);
                     $data_arr = array();
                     $counter = 0;
                     if ($custom_query->have_posts()) :
                        while ($custom_query->have_posts()) : $custom_query->the_post();
                        $data_arr[$counter]['title'] = get_field('title');
                        $data_arr[$counter]['cover'] = get_field('cover');
                        $data_arr[$counter]['date'] = get_field('date');
                        $data_arr[$counter]['link'] = get_permalink();
                        $data_arr[$counter]['promoter_name'] = get_field('promoter_name');
                        $data_arr[$counter]['artist_name'] = get_field('artist_name');
                        $data_arr[$counter]['location'] = get_field('location');
                        $data_arr[$counter]['doors'] = get_field('doors');
                        $data_arr[$counter]['shows'] = get_field('shows');
                        $counter++;

                        ?>
                           <div class="event-list-item">
                    <div class="event-image">
                        
                        <img src="<?php echo get_field('cover'); ?>" alt="Event Image">
                       
                    </div>
                    <div class="event-info">
                        <h2 class="event-name"><?php echo get_field('title'); ?></h2>
                        <div class="event-meta">
                            <p class="event-date-meta"><?php echo get_field('promoter_name'); ?></p>
                            <p class="event-artist"><?php echo get_field('artist_name'); ?></p>
                            <p class="event-location"><?php echo get_field('location'); ?></p>
                            <p class="event-time">
                                GA Doors: <?php echo get_field('doors'); ?>
                                <span class="time-separator"></span>
                                Show: <?php echo get_field('shows'); ?>
                            </p>
                        </div>
                        <a href="<?php echo get_permalink();?>" class="buy-tickets-button" data-event-id="demo-event">BUY TICKETS</a>
                    </div>
                </div>
                <!-- var eventsData = [
            {
                id: 1,
                title: 'Concert Night',
                date: new Date(currentYear, currentMonth, 10),
                image: '<?php echo get_template_directory_uri(); ?>/images/events/event1.png',
                location: 'The Music Hall',
                artist: 'John Doe',
                doors: '7:00 PM',
                show: '8:00 PM',
                type: 'marker'
            },
            {
                id: 2,
                title: 'Jazz Festival',
                date: new Date(currentYear, currentMonth, 15),
                image: '<?php echo get_template_directory_uri(); ?>/images/events/event2.png',
                location: 'Downtown Arena',
                artist: 'Jazz Ensemble',
                doors: '6:30 PM',
                show: '7:30 PM',
                type: 'thumbnail'
            },
            {
                id: 3,
                title: 'Rock Event',
                date: new Date(currentYear, currentMonth, 15),
                image: '',
                location: 'City Stadium',
                artist: 'Rock Band',
                doors: '5:00 PM',
                show: '6:00 PM',
                type: 'marker'
            },
            {
                id: 4,
                title: 'Classical Night',
                date: new Date(currentYear, currentMonth, 22),
                image: '<?php echo get_template_directory_uri(); ?>/images/events/event1.png',
                location: 'Opera House',
                artist: 'Symphony Orchestra',
                doors: '7:00 PM',
                show: '8:00 PM',
                type: 'thumbnail'
            }
        ]; -->
                <?php
                endwhile;
                $data_arr = json_encode($data_arr);
            ?>
              <?php
                endif;
            ?>
        </div>
        
        <!-- 日历视图 -->
        <div class="tab-content" id="events-calendar-content" style="display:none;">
            <div class="calendar-header">
                <button class="calendar-nav prev"><span>&lt;</span></button>
                <h2 class="calendar-title"></h2>
                <button class="calendar-nav next"><span>&gt;</span></button>
            </div>
            <style>
                thead tr{
                    display: flex;
                    justify-content:center;
                    align-items:center;
                    width: 100%;
                }
                tbody tr{
                    display: flex;
                    justify-content:center;
                    align-items:center;
                    width: 100%;
                }
                thead tr th{
                    flex:1
                }
                tbody tr td{
                    text-align: left !important;
                    flex:1
                }
                
            </style>
            <table class="events-calendar">
                <thead>
                    <tr>
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                    </tr>
                </thead>
                <tbody id="calendar-body">
                    <!-- 日历将通过JavaScript动态生成 -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    #events-calendar-content{
        background-color:rgb(55,62,83);
    }
    /* Events Page Styles */
    .events-page {
        padding: 20px;
        position: relative;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    /* Follow Us Button */
    .follow-us-button {
        position: absolute;
        left: 20px;
        top: 30px;
    }
    
    .circle-button {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        background-color: #fff;
        color: #373e53;
        border-radius: 50%;
        text-decoration: none;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        font-size: 0;
    }
    
    .circle-button:hover {
        transform: scale(1.1);
    }
    
    .circle-button span {
        display: none;
    }
    
    .circle-button:before {
        content: "→";
        font-size: 24px;
        font-weight: bold;
    }
    
    /* Page Title */
    .page-title {
        text-align: center;
        font-size: 32px;
        margin: 40px 0 30px;
        color: #373e53;
    }
    
    /* Featured Events */
    .featured-events {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .event-card {
        display: flex;
        background-color: #373e53;
        color: white;
        border-radius: 5px;
        overflow: hidden;
        flex: 1;
    }
    
    .event-date {
        padding: 15px;
        background-color: #373e53;
        font-weight: bold;
        border-right: 1px solid rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
    }
    
    .event-details {
        padding: 35px;
        flex: 1;
    }
    
    .event-title {
        margin: 0;
        font-size: 16px;
    }
    
    /* Tabs */
    .events-tabs {
        display: flex;
        margin: 30px 0px 0px 0px;
    }
    
    .tab {
        color: white;
        text-decoration: none;
        width: 323px;
        height: 75px;
        line-height: 75px;
        transition: all 0.3s ease;
        text-align: center;
        font-size: 22.5px;
        background-color: #dc5b92;

    }
    #events-calendar-tab{
        color: white;
        background-color: #dc5b92;
    }
    #all-events-tab{
        color: white;
        background-color: rgb(55,62,83);
    }
    
    /* Event List Items */
    .event-list-item {
        display: flex;
        background-color: #373e53;
        overflow: hidden;
        color: white;
    }
    
    .event-image {
        
        width: 450px;
        height:340px !important;
        
        overflow: hidden;
        padding:50px 0px 50px 50px
    }
    
    .event-image img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover;
    }
    
    .event-info {
        padding: 50px;
        flex: 1;
    }
    
    .event-name {
        margin-top: 0;
        margin-bottom: 15px;
        font-size: 24px;
    }
    
    .event-meta {
        margin-bottom: 20px;
    }
    .event-artist{
        margin-top:15px !important
    }
    .event-date-meta, .event-artist, .event-location, .event-time {
        margin-top:15px !important
    }
    .event-date-meta{
        margin:20px 0px !important

    }
    .event-time{
        display: flex;
        justify-content:space-between;
        align-items:center;
    }
    .event-date-meta {
        font-weight: bold;
    }
    
    .time-separator {
        display: inline-block;
        width: 20px;
    }
    
    .buy-tickets-button {
        display: inline-block;
        background-color: #c6c7e1;
        color: #373e53;
        padding: 10px 25px;
        text-decoration: none;
        border-radius: 4px;
        transition: all 0.3s ease;
        font-size:24px;
        text-align:center;
        width: 100%;
    }
    
    .buy-tickets-button:hover {
        background-color: #ff5bb0;
        color: white;
    }
    
    /* Calendar Styles */
    .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        background-color:#dc5b92;
    }
    
    .calendar-title {
        margin: 0;
        text-align: center;
        flex: 1;
    }
    
    .calendar-nav {
        background-color: rgb(55,62,83);
        color: white;
        border: none;
        border-radius: 4px;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 18px;
        transition: all 0.3s ease;
    }
    
    .calendar-nav:hover {
        background-color: #ff5bb0;
    }
    
    .events-calendar {
        width: 100%;
        border-collapse: collapse;
    }
    
    .events-calendar th, .events-calendar td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
        height: 160px;
        vertical-align: top;
        color: #333;
        background-color: white;
        position: relative;
        overflow: hidden; /* 防止内容溢出 */
    }
    
    .events-calendar th {
        background-color: #f8f8f8;
        height: auto;
        padding: 15px 8px;
    }
    
    .prev-month, .next-month {
        color: #aaa !important;
    }
    
    /* 高亮今天 */
    .today {
        background-color: #f0f8ff;
        font-weight: bold;
        color: #dc5b92;
    }
    
    .event-marker {
        background-color: #dc5b92;
        color: white;
        padding: 2px 5px;
        font-size: 10px;
        border-radius: 3px;
        margin-top: 5px;
        display: inline-block;
        cursor: pointer;
    }
    
    .event-thumbnail {
        margin-top: 5px;
        cursor: pointer;
        height: 100%;
        overflow: hidden; /* 超出部分隐藏 */
        display: flex;
        flex-direction: column;
        width: 100%;
    }
    
    .event-thumbnail img {
        width: 100%;
        height: 100px; /* 固定图片高度 */
        object-fit: cover; /* 保持图片比例，覆盖容器 */
        border-radius: 3px;
    }
    
    .event-p-title {
        font-size: 11px;
        margin: 2px 0 0 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: #373e53;
    }
    
    /* 多个事件标记 */
    .event-count {
        background-color: #373e53;
        color: white;
        padding: 4px 8px;
        font-size: 12px;
        border-radius: 4px;
        margin-top: 5px;
        display: block;
        cursor: pointer;
        width: 80%;
        margin: 5px auto;
        text-align: center;
    }
    
    /* 事件提示框 */
    .event-tooltip {
        position: absolute;
        top: 100%;
        left: 0;
        background-color: white;
        border: 1px solid #ddd;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        padding: 12px;
        border-radius: 4px;
        z-index: 100;
        width: 250px;
        display: none;
        color: #333;
        text-align: left;
    }
    
    .multi-events.event-tooltip {
        width: 300px;
    }
    
    .tooltip-title {
        font-weight: bold;
        margin-bottom: 8px;
        color: #373e53;
        border-bottom: 1px solid #eee;
        padding-bottom: 8px;
        font-size: 14px;
    }
    
    .tooltip-details p {
        margin: 5px 0;
        font-size: 12px;
        line-height: 1.4;
    }
    
    .tooltip-details a {
        color: #dc5b92;
        text-decoration: none;
        font-weight: bold;
    }
    
    .tooltip-details a:hover {
        text-decoration: underline;
    }
    
    .tooltip-events {
        max-height: 250px;
        overflow-y: auto;
    }
    
    .tooltip-event {
        padding: 10px 0;
        border-bottom: 1px solid #eee;
        cursor: pointer;
    }
    
    .tooltip-event:last-child {
        border-bottom: none;
    }
    
    .tooltip-event:hover {
        background-color: #f9f9f9;
    }
    
    .tooltip-event-title {
        font-weight: bold;
        font-size: 13px;
        color: #dc5b92;
        margin-bottom: 5px;
    }
    
    .tooltip-event-details p {
        margin: 4px 0;
        font-size: 11px;
        line-height: 1.4;
    }
    
    .tooltip-event-details a {
        color: #dc5b92;
        text-decoration: none;
        font-weight: bold;
    }
    
    .tooltip-event-details a:hover {
        text-decoration: underline;
    }
    
    .calendar-title{
        color:white
    }
    
    /* 响应式 */
    @media (max-width: 768px) {
        .featured-events {
            flex-direction: column;
        }
        
        .event-list-item {
            flex-direction: column;
        }
        
        .event-image {
            width: 100%;
            max-width: none;
            height: 200px;
        }
        
        .tab {
            padding: 10px 15px;
            font-size: 14px;
        }
        
        .events-calendar th, .events-calendar td {
            padding: 5px;
            height: 60px;
            font-size: 12px;
        }
        
        .event-tooltip {
            width: 180px;
        }
        
        .multi-events.event-tooltip {
            width: 200px;
        }
    }
</style>

<script>
    // 简单的标签切换功能
    document.addEventListener('DOMContentLoaded', function() {
        var allEventsTab = document.getElementById('all-events-tab');
        var calendarTab = document.getElementById('events-calendar-tab');
        var allEventsContent = document.getElementById('all-events-content');
        var calendarContent = document.getElementById('events-calendar-content');
        var calendarInitialized = false;
        var currentDate = new Date();
        var currentMonth = currentDate.getMonth();
        var currentYear = currentDate.getFullYear();
        var calendarTitle = document.querySelector('.calendar-title');
        var prevButton = document.querySelector('.calendar-nav.prev');
        var nextButton = document.querySelector('.calendar-nav.next');
        var calendarBody = document.getElementById('calendar-body');
        
        // 模拟事件数据
        var eventsData = JSON.parse('<?php echo $data_arr?>');
        // 月份名称
        var monthNames = ["January", "February", "March", "April", "May", "June",
                          "July", "August", "September", "October", "November", "December"];
        
        // 生成日历函数
        function generateCalendar(month, year) {
            // 更新日历标题
            calendarTitle.textContent = monthNames[month].toUpperCase() + " " + year;
            
            // 清空日历内容
            calendarBody.innerHTML = '';
            
            // 获取当月第一天
            var firstDay = new Date(year, month, 1);
            
            // 获取当月第一天是星期几 (0-6, 0表示周日)
            var startingDay = firstDay.getDay();
            
            // 获取当月天数
            var monthLength = new Date(year, month + 1, 0).getDate();
            
            // 获取上个月天数
            var prevMonthLength = new Date(year, month, 0).getDate();
            
            // 计算行数 (通常5-6行)
            var numRows = Math.ceil((startingDay + monthLength) / 7);
            
            // 当前日期（用于高亮显示今天）
            var today = new Date();
            var todayDate = today.getDate();
            var todayMonth = today.getMonth();
            var todayYear = today.getFullYear();
            
            // 生成日历行
            var date = 1;
            var nextMonthDate = 1;
            
            for (var i = 0; i < numRows; i++) {
                // 创建行
                var row = document.createElement('tr');
                
                // 生成单元格
                for (var j = 0; j < 7; j++) {
                    // 创建单元格
                    var cell = document.createElement('td');
                    
                    // 填充上个月的日期
                    if (i === 0 && j < startingDay) {
                        var prevDate = prevMonthLength - startingDay + j + 1;
                        cell.textContent = prevDate;
                        cell.classList.add('prev-month');
                    } 
                    // 填充当月的日期
                    else if (date <= monthLength) {
                        cell.textContent = date;
                        
                        // 高亮显示今天
                        if (date === todayDate && month === todayMonth && year === todayYear) {
                            cell.classList.add('today');
                        }
                        
                        // 添加当天的事件
                        var dayEvents = getEventsForDate(date, month, year);
                        if (dayEvents.length > 0) {
                            if (dayEvents.length === 1) {
                                // 只有一个事件时，直接显示事件
                                var event = dayEvents[0];
                                if (event.cover) {
                                    var thumbnail = document.createElement('div');
                                    thumbnail.className = 'event-thumbnail';
                                    thumbnail.setAttribute('data-link', event.link || '#');
                                    thumbnail.setAttribute('title', event.title || 'Event');
                                    
                                    var img = document.createElement('img');
                                    img.src = event.cover;
                                    img.alt = event.title || 'Event';
                                    
                                    var p_text = document.createElement('p');
                                    p_text.className = 'event-p-title';
                                    p_text.textContent = event.title || 'Event';
                                    
                                    thumbnail.appendChild(img);
                                    thumbnail.appendChild(p_text);
                                    cell.appendChild(thumbnail);

                                    // 添加点击事件
                                    thumbnail.addEventListener('click', function() {
                                        var eventLink = this.getAttribute('data-link');
                                        if (eventLink && eventLink !== '#') {
                                            window.location.href = eventLink;
                                        }
                                    });
                                } else {
                                    var marker = document.createElement('div');
                                    marker.className = 'event-marker';
                                    marker.setAttribute('data-link', event.link || '#');
                                    marker.textContent = event.title || 'Event';
                                    
                                    // 添加点击事件
                                    marker.addEventListener('click', function() {
                                        var eventLink = this.getAttribute('data-link');
                                        if (eventLink && eventLink !== '#') {
                                            window.location.href = eventLink;
                                        }
                                    });
                                    
                                    cell.appendChild(marker);
                                }
                                
                                // 添加事件提示
                                addEventTooltip(cell, event);
                            } else {
                                // 多个事件时，显示数量
                                var countBadge = document.createElement('div');
                                countBadge.className = 'event-count';
                                countBadge.textContent = dayEvents.length + ' Events';
                                cell.appendChild(countBadge);
                                
                                // 为多个事件创建提示框
                                addMultipleEventsTooltip(cell, dayEvents);
                            }
                        }
                        
                        date++;
                    } 
                    // 填充下个月的日期
                    else {
                        cell.textContent = nextMonthDate;
                        cell.classList.add('next-month');
                        nextMonthDate++;
                    }
                    
                    row.appendChild(cell);
                }
                
                calendarBody.appendChild(row);
            }
        }
        
        // 获取指定日期的事件
        function getEventsForDate(day, month, year) {
            return eventsData.filter(function(event) {
                // 解析Y-m-d格式的日期字符串
                if (!event.date) return false;
                
                var dateParts = event.date.split('-');
                if (dateParts.length !== 3) return false;
                
                var eventYear = parseInt(dateParts[0]);
                var eventMonth = parseInt(dateParts[1]) - 1; // JavaScript月份从0开始
                var eventDay = parseInt(dateParts[2]);
                
                return eventDay === day && eventMonth === month && eventYear === year;
            });
        }
        
        // 为单个事件添加提示框
        function addEventTooltip(cell, event) {
            // 创建提示框内容
            var tooltip = document.createElement('div');
            tooltip.className = 'event-tooltip';
            tooltip.innerHTML = `
                <div class="tooltip-title">${event.title || 'Event'}</div>
                <div class="tooltip-details">
                    ${event.artist_name ? `<p><strong>Artist:</strong> ${event.artist_name}</p>` : ''}
                    ${event.promoter_name ? `<p><strong>Promoter:</strong> ${event.promoter_name}</p>` : ''}
                    ${event.location ? `<p><strong>Location:</strong> ${event.location}</p>` : ''}
                    ${event.doors || event.shows ? `<p><strong>Time:</strong> ${event.doors ? 'Doors ' + event.doors : ''} ${event.shows ? ' | Show ' + event.shows : ''}</p>` : ''}
                    <p><a href="${event.link || '#'}">View Details</a></p>
                </div>
            `;
            
            // 添加提示框
            cell.appendChild(tooltip);
            
            // 鼠标事件
            cell.addEventListener('mouseenter', function() {
                tooltip.style.display = 'block';
            });
            
            cell.addEventListener('mouseleave', function() {
                tooltip.style.display = 'none';
            });
        }
        
        // 为多个事件添加提示框
        function addMultipleEventsTooltip(cell, events) {
            // 创建提示框内容
            var tooltip = document.createElement('div');
            tooltip.className = 'event-tooltip multi-events';
            
            var tooltipContent = '<div class="tooltip-title">Events</div><div class="tooltip-events">';
            
            events.forEach(function(event) {
                tooltipContent += `
                    <div class="tooltip-event" data-link="${event.link || '#'}">
                        <div class="tooltip-event-title">${event.title || 'Event'}</div>
                        <div class="tooltip-event-details">
                            ${event.artist_name ? `<p><strong>Artist:</strong> ${event.artist_name}</p>` : ''}
                            ${event.location ? `<p><strong>Location:</strong> ${event.location}</p>` : ''}
                            ${event.doors || event.shows ? `<p><strong>Time:</strong> ${event.doors ? 'Doors ' + event.doors : ''} ${event.shows ? ' | Show ' + event.shows : ''}</p>` : ''}
                            <p><a href="${event.link || '#'}">View Details</a></p>
                        </div>
                    </div>
                `;
            });
            
            tooltipContent += '</div>';
            tooltip.innerHTML = tooltipContent;
            
            // 添加提示框
            cell.appendChild(tooltip);
            
            // 鼠标事件
            cell.addEventListener('mouseenter', function() {
                tooltip.style.display = 'block';
            });
            
            cell.addEventListener('mouseleave', function() {
                tooltip.style.display = 'none';
            });
            
            // 为每个事件添加点击事件
            var eventElements = tooltip.querySelectorAll('.tooltip-event');
            eventElements.forEach(function(element) {
                element.addEventListener('click', function() {
                    var eventLink = this.getAttribute('data-link');
                    if (eventLink && eventLink !== '#') {
                        window.location.href = eventLink;
                    }
                });
            });
        }
        
        // 初始化日历
        function initCalendar() {
            if (!calendarInitialized) {
                // 生成当前月份的日历
                generateCalendar(currentMonth, currentYear);
                
                // 添加月份导航事件
                prevButton.addEventListener('click', function() {
                    currentMonth--;
                    if (currentMonth < 0) {
                        currentMonth = 11;
                        currentYear--;
                    }
                    generateCalendar(currentMonth, currentYear);
                });
                
                nextButton.addEventListener('click', function() {
                    currentMonth++;
                    if (currentMonth > 11) {
                        currentMonth = 0;
                        currentYear++;
                    }
                    generateCalendar(currentMonth, currentYear);
                });
                
                calendarInitialized = true;
            }
        }
        
        // 检查URL参数，如果有calendar=1参数，自动切换到日历视图
        function checkUrlParameters() {
            var urlParams = new URLSearchParams(window.location.search);
            var showCalendar = urlParams.get('calendar') === '1';
            
            if (showCalendar) {
                // 自动切换到日历视图
                calendarTab.classList.add('active');
                allEventsTab.classList.remove('active');
                calendarContent.style.display = 'block';
                allEventsContent.style.display = 'none';
                
                // 初始化日历
                initCalendar();
                
                // 移除URL参数，避免刷新页面时重复切换
                if (history.pushState) {
                    var newUrl = window.location.pathname;
                    history.pushState({path: newUrl}, '', newUrl);
                }
            }
        }
        
        // 页面加载后检查URL参数
        checkUrlParameters();
        
        allEventsTab.addEventListener('click', function(e) {
            e.preventDefault();
            allEventsTab.classList.add('active');
            calendarTab.classList.remove('active');
            allEventsContent.style.display = 'block';
            calendarContent.style.display = 'none';
        });
        
        calendarTab.addEventListener('click', function(e) {
            e.preventDefault();
            calendarTab.classList.add('active');
            allEventsTab.classList.remove('active');
            calendarContent.style.display = 'block';
            allEventsContent.style.display = 'none';
            
            // 初始化日历
            initCalendar();
        });
        
        // 为所有BUY TICKETS按钮添加点击事件
        var buyTicketsButtons = document.querySelectorAll('.buy-tickets-button');
        
        buyTicketsButtons.forEach(function(button) {
            // button.addEventListener('click', function(e) {
            //     e.preventDefault();
            //     // 存储当前URL，以便返回
            //     sessionStorage.setItem('prevPageUrl', window.location.href);
                
            //     // 记录当前是否在日历视图
            //     var isCalendarView = calendarContent.style.display === 'block';
            //     if (isCalendarView) {
            //         sessionStorage.setItem('calendarView', '1');
            //     }
                
            //     // 获取事件ID或使用默认值
            //     var eventId = this.getAttribute('data-event-id') || 'demo-event';
                
            //     // 跳转到单个事件页面
            //     var eventUrl = '<?php echo esc_url(home_url("/")); ?>?page_id=154&event=' + eventId;
            //     window.location.href = eventUrl;
            // });
        });
        
        // 处理日历中事件点击
        document.addEventListener('click', function(e) {
            if (e.target.closest('.event-marker') || e.target.closest('.event-thumbnail') || e.target.closest('.event-count')) {
                // 如果点击的是事件计数，则不处理，由提示框内的事件处理
                if (e.target.closest('.event-count')) {
                    return;
                }
                
                // 存储当前URL，以便返回
                sessionStorage.setItem('prevPageUrl', window.location.href);
                
                // 记录当前是从日历视图进入
                sessionStorage.setItem('calendarView', '1');
                
                // 获取事件链接
                var element = e.target.closest('.event-marker') || e.target.closest('.event-thumbnail');
                var eventLink = element?.getAttribute('data-link') || '#';
                
                // 跳转到事件详情页
                if (eventLink && eventLink !== '#') {
                    window.location.href = eventLink;
                }
            }
        });
    });
</script>

<?php get_footer(); ?> 