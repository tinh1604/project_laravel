@extends('frontend.layouts.main')
@section('title','News')
@section('content')
<main class="main-container">
    <section class="main-content">
        <div class="main-content-wrapper">
            <div class="content-body">
                <div class="content-timeline">
                    <!--Timeline header area start -->
                    <div class="post-list-header">
                        <span class="post-list-title">Chi tiết bài viết</span>
                        <select class="frm-input">
                            <option value="1">Thể thao</option>
                            <option value="1">Công nghệ</option>
                            <option value="1">Trong nước</option>
                        </select>
                    </div>
                    <!--Timeline header area end -->
                    <!--Timeline items start -->
                    <div class="timeline-items">

                        <div class="timeline-item">
                            <div class="timeline-left">
                                <div class="timeline-left-wrapper">
                                    <a href="<?php $urlNews ?>" class="timeline-category" data-zebra-tooltip
                                       title="Thể thao"><i
                                                class="material-icons">&#xE894;</i></a>
                                    <span class="timeline-date">
                                        <?php
                                        echo date('d-m-Y', strtotime($news['created_at']));
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div class="timeline-right">
                                <div class="timeline-post-image">
                                    <a href="<?php echo $urlNews; ?>">
                                        <img src="../backend/assets/uploads/<?php echo $news['avatar'] ?>"
                                             width="260">
                                    </a>
                                </div>
                                <div class="timeline-post-content">
                                    <a href="<?php echo $urlNews ?>" class="timeline-category-name">
                                        <?php echo $news['category_name']; ?>
                                    </a>
                                    <h3 class="timeline-post-title">
                                        <?php echo $news['title']?>
                                    </h3>
                                    <div class="timeline-post-info">
                                        <a href="<?php echo $urlNews ?>" class="author">
                                            <?php echo $news['admin_username']?>
                                        </a>
                                        <span class="dot"></span>
                                        <span class="comment">
                                            <?php echo $news['comment_total']?> comments
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!--Timeline items end -->
                    <div class="detail timeline-items">
                        <b class="detail-summary">
                            <?php echo $news['summary'] ?>
                        </b>
                        <div class="detail-description">
                            <?php echo $news['content']?>
                        </div>
                    </div>
                    <div class="detail-comment">
                        <div class="fb-comments" data-href="https://sukien.net" data-width="" data-numposts="5"></div>
                    </div>
                </div>

            </div>
            <?php require_once 'views/layouts/sidebar-right.php'?>
        </div>
    </section>

</main>
<?php include_once 'views/layouts/footer.php' ?>
