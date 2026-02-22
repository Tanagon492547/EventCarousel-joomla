<?php

defined('_JEXEC') or die;

$document = $this->app->getDocument();
$wa = $document->getWebAssetManager();
$wa->getRegistry()->addExtensionRegistryFile('mod_event_carousel');
$wa->useScript('bootstrap5-bundle')
  ->useStyle('mod_event_carousel.main');


?>

<div class="w-100 d-flex justify-content-center">
  <div id="carouselExampleControls" class="carousel slide carousel-container px-4 px-md-0" data-bs-ride="carousel">
    <div class="d-flex justify-content-between align-items-center">
      <div class="fs-2 text-primary w-100 d-flex justify-content-start align-items-center">
        <p>
          <?php echo htmlspecialchars($titleCarousel) ?>
        </p>
      </div>
      <div class="d-flex w-auto">
        <button class="btn btn-sm btn-light rounded-circle shadow align-items-center  d-flex justify-content-between"
          type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon text-primary" aria-hidden="true"
            style="width: 20px; height: 20px; filter: invert(1);"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <div class="d-flex mx-2"></div>
        <button class="btn btn-sm btn-light rounded-circle shadow d-flex align-items-center justify-content-between"
          type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon  text-primary" aria-hidden="true"
            style="width: 20px; height: 20px; filter: invert(1);"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>


    <div class="carousel-inner ">
      <?php if (!empty($items)): ?>
        <?php
        $chunks = array_chunk($items, 4);
        foreach ($chunks as $index => $group):
          $isActive = "";
          if ($index == 0) {
            $isActive = "active";
          } else {
            $isActive = "";
          }
          ?>
          <div class="carousel-item <?php echo htmlspecialchars($isActive); ?>">
            <div class="row g-3">
              <?php if (!empty($group)): ?>
                <?php
                foreach ($group as $item):
                  $imgObj = json_decode($item->jcfields['scholarships-image']->rawvalue ?? '{}');
                  $scholarshipsImage = !empty($imgObj->imagefile) ? explode('#', $imgObj->imagefile)[0] : 'images/default.jpg';
                  $sourcesFunding = $item->jcfields['sources-funding']->value ?? 'ไม่มีข้อมูล';
                  $scholarshipName = $item->jcfields['scholarship-name']->value ?? 'ไม่มีข้อมูล';
                  $openDay = $item->jcfields['open-day']->value ?? 'ไม่มีข้อมูล';
                  $closeDate = $item->jcfields['close-date']->value ?? 'ไม่มีข้อมูล';
                  $scholarshipsUrl = $item->jcfields['scholarships-url']->rawvalue ?? 'ไม่มีข้อมูล';
                  ?>
                  <div class="col-12 col-sm-6 col-xl-3 mb-2">
                    <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                      <div class="h-auto">
                        <img class="w-100 h-100 object-fit-cover" src="<?php echo htmlspecialchars($scholarshipsImage); ?>"
                          alt="First slide">
                      </div>

                      <div class="card-body d-flex flex-column p-3">
                        <small class="mb-1 text-truncate fw-light  text-color text-truncate">แหล่งเงินทุน :
                          <?php echo htmlspecialchars($sourcesFunding); ?>
                        </small>

                        <p class="card-text fw-bold fs-6 mb-3 text-color"
                          style="font-size: 0.95rem;  line-height: 1.4;  min-height: 2.8rem;  height: 2.8rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                          <?php echo htmlspecialchars($scholarshipName); ?>
                        </p>

                        <div class="d-flex flex-column gap-2 mb-4">
                          <div class="d-flex align-items-center justify-content-between  py-2 rounded">
                            <span class="badge bg-success fs-6" style="width: 80px;">เปิดรับ</span>
                            <small class="text-muted">
                              <?php echo htmlspecialchars($openDay); ?>
                            </small>
                          </div>
                          <div class="d-flex align-items-center justify-content-between  py-2 rounded">
                            <span class="badge bg-danger fs-6" style="width: 80px;">ปิดรับ</span>
                            <small class="text-danger fw-bold">
                              <?php echo htmlspecialchars($closeDate); ?>
                            </small>
                          </div>
                        </div>

                        <a class="btn btn-primary w-100 mt-auto rounded-pill shadow-sm" type="button"
                          href="<?php echo htmlspecialchars($scholarshipsUrl); ?>" target="_blank" rel="noopener">
                          ดูรายละเอียด
                        </a>
                      </div>

                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>



  </div>
</div>