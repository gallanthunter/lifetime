<?php
/* Template Name: 时间轴
 * 功能:
 * 参数：
 * 作者: Zhang Zhijun
 * 日期: 2019/5/30 22:42
 */
?>

<?php get_header(); ?>
<div class="container p-0">


    <div class="row">
        <div class="col-xl-12">
            <section class="timeline text-secondary">
                <div class="col-xl-12">
                    <div class="article-title font-weight-bold text-center">
                        <a href="<?php the_permalink() ?>" target="_blank"><?php the_title(); ?></a>
                    </div>
                </div>
                <div class="col-xl-12">
                    <?php the_content() ?>

                    <div class="timeline-item" date-is='20-07-1990'>
                        <h1>Hello, 'Im a single div responsive timeline without mediaQueries!</h1>
                        <p>
                            I'm speaking with myself, number one, because I have a very good brain and I've said a lot
                            of
                            things. I write the best placeholder text, and I'm the biggest developer on the web by
                            far...
                            While that's mock-ups and this is politics, are they really so different? I think the only
                            card
                            she has is the Lorem card.
                        </p>
                    </div>

                    <div class="timeline-item" date-is='20-07-1990'>
                        <h1>Oeehhh, that's awesome.. Me too!</h1>
                        <p>
                            I'm speaking with myself, number one, because I have a very good brain and I've said a lot
                            of
                            things. I write the best placeholder text, and I'm the biggest developer on the web by
                            far...
                            While that's mock-ups and this is politics, are they really so different? I think the only
                            card
                            she has is the Lorem card.
                        </p>
                    </div>

                    <div class="timeline-item" date-is='20-07-1990'>
                        <h1>I'm ::last-child so my border fades ^__^</h1>
                        <p>
                            I'm speaking with myself, number one, because I have a very good brain and I've said a lot
                            of
                            things. I write the best placeholder text, and I'm the biggest developer on the web by
                            far...
                            While that's mock-ups and this is politics, are they really so different? I think the only
                            card
                            she has is the Lorem card.
                        </p>
                    </div>

                    <div class="timeline-item" date-is='20-07-1990'>
                        <h1>I'm ::last-child so my border fades ^__^</h1>
                        <p>
                            I'm speaking with myself, number one, because I have a very good brain and I've said a lot
                            of
                            things. I write the best placeholder text, and I'm the biggest developer on the web by
                            far...
                            While that's mock-ups and this is politics, are they really so different? I think the only
                            card
                            she has is the Lorem card.
                        </p>
                    </div>

                    <div class="timeline-item" date-is='20-07-1990'>
                        <h1>I'm ::last-child so my border fades ^__^</h1>
                        <p>
                            I'm speaking with myself, number one, because I have a very good brain and I've said a lot
                            of
                            things. I write the best placeholder text, and I'm the biggest developer on the web by
                            far...
                            While that's mock-ups and this is politics, are they really so different? I think the only
                            card
                            she has is the Lorem card.
                        </p>
                    </div>

                    <div class="timeline-item" date-is='20-07-1990'>
                        <h1>I'm ::last-child so my border fades ^__^</h1>
                        <p>
                            I'm speaking with myself, number one, because I have a very good brain and I've said a lot
                            of
                            things. I write the best placeholder text, and I'm the biggest developer on the web by
                            far...
                            While that's mock-ups and this is politics, are they really so different? I think the only
                            card
                            she has is the Lorem card.
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php get_footer(); ?>
