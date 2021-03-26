<?php
require APPROOT . '/views/inc/header.php'; ?>

<div class="container pt-9">
    <h1 class="heading-1 pt-3"><?php echo $data["title"] ?></h1>
    <div class="bottom-line"></div>
    <div class="events">
        <?php $i = 0;
        setlocale(LC_TIME, "fr_FR");
        foreach ($data["events"] as $event) : ?>
            <?php if ($i === 0) : $i = 1 ?>
                <div class="event-content py-3">
                    <div class="column-event">
                        <div class="image-event"><img src="<?php echo URLROOT . '/img/communities/events/' . $event->image ?>" alt="">
                        </div>
                    </div>
                    <div class="column-event">
                        <div class="infos-event px-3">
                            <p class="event-entitled py-1"><?php echo $event->entitled ?></p>
                            <p class="event-description"><?php echo $event->description ?></p>
                            <div class="event-details py-1">
                                <div class="event-adresse">
                                    <p>Adresse:</p>
                                    <address>
                                        <?php echo $event->adresse ?></br>
                                        <?php echo $event->zip_code ?></br>
                                        <?php echo $event->city ?></br>
                                    </address>
                                </div>
                                <div class="event-timedate">
                                    <p class="start-event">le <?php echo strftime("%A %d %B %G", strtotime($event->start_at)); ?></p>
                                    <p>De: <?php echo strftime("%Hh%M", strtotime($event->start_at)) ?> à <?php echo strftime("%Hh%M", strtotime($event->end_at)) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif ($i === 1) : $i = 0 ?>
                <div class="row-reverse-event-content py-3">
                    <div class="column-event">
                        <div class="image-event"><img src="<?php echo URLROOT . '/img/communities/events/' . $event->image ?>" alt="">
                        </div>
                    </div>
                    <div class="column-event">
                        <div class="infos-event px-3">
                            <p class="event-entitled py-1"><?php echo $event->entitled ?></p>
                            <p class="event-description"><?php echo $event->description ?></p>
                            <div class="event-details py-1">
                                <div class="event-adresse">
                                    <p>Adresse:</p>
                                    <address>
                                        <?php echo $event->adresse ?></br>
                                        <?php echo $event->zip_code ?></br>
                                        <?php echo $event->city ?></br>
                                    </address>
                                </div>
                                <div class="event-timedate">
                                    <p class="start-event">le <?php echo strftime("%A %d %B %G", strtotime($event->start_at)); ?></p>
                                    <p>De: <?php echo strftime("%Hh%M", strtotime($event->start_at)) ?> à <?php echo strftime("%Hh%M", strtotime($event->end_at)) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        <?php endforeach ?>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php';
