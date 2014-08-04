<div class="page-content">
    <div class="row page-row">
        <header class="page-heading clearfix">
            <h1 class="heading-title pull-left">Lớp sắp tổ chức</h1>
        </header>
        <?php foreach ($courses as $course): ?>
            <article class="news-item page-row has-divider clearfix row">       
                <figure class="thumb col-md-2 col-sm-3 col-xs-4">
                    <?php
                    echo $this->Html->link(
                            $this->Html->image('/files/course/image/' . $course['Course']['image_path'] . '/' . h($course['Course']['image']), array('class' => "img-responsive", 'style' => "width: 300px; height: 200px;")), array('guest' => true, 'controller' => 'courses', 'action' => 'view', $course['Course']['id']), array('escape' => false, 'class' => ' prettyphoto add-button fancybox.ajax')
                    );
                    ?>
                </figure>
                <div class="details col-md-10 col-sm-9 col-xs-8">
                    <h3 class="title"><?php echo $course['Course']['name'] ?></h3>
                    <p><?php echo $course['Course']['decription'] ?></p>
                    <a class="btn btn-theme read-more" href="news-single.html" tppabs="http://themes.3rdwavemedia.com/college-green/news-single.html">Chi tiết<i class="fa fa-chevron-right"></i></a>
                </div>
            </article><!--//news-item-->
        <?php endforeach; ?>
    </div>
</div>