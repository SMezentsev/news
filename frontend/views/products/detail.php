<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="quickview modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <button type="button" class="quickview__close">
      <svg width="12" height="12">
        <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
	C11.2,9.8,11.2,10.4,10.8,10.8z" />
      </svg>
    </button>
    <div class="quickview__body">
      <div class="product-gallery product-gallery--layout--quickview quickview__gallery" data-layout="quickview">
        <div class="product-gallery__featured">
          <button type="button" class="product-gallery__zoom">
            <svg width="24" height="24">
              <path d="M15,18c-2,0-3.8-0.6-5.2-1.7c-1,1.3-2.1,2.8-3.5,4.6c-2.2,2.8-3.4,1.9-3.4,1.9s-0.6-0.3-1.1-0.7
	c-0.4-0.4-0.7-1-0.7-1s-0.9-1.2,1.9-3.3c1.8-1.4,3.3-2.5,4.6-3.5C6.6,12.8,6,11,6,9c0-5,4-9,9-9s9,4,9,9S20,18,15,18z M15,2
	c-3.9,0-7,3.1-7,7s3.1,7,7,7s7-3.1,7-7S18.9,2,15,2z M16,13h-2v-3h-3V8h3V5h2v3h3v2h-3V13z" />
            </svg>
          </button>
          <div class="owl-carousel">

            <?php foreach ($product['images'] as $image) { ?>

              <a class="image image--type--product" href="<?= $image['original'] ?? '/images/no-photo.jpg' ?>"
                 target="_blank" data-width="700" data-height="700">
                <div class="image__body">
                  <img class="image__tag" src="<?= $image['original'] ?? '/images/no-photo.jpg' ?>" alt="">
                </div>
              </a>

            <?php } ?>

          </div>
        </div>
        <div class="product-gallery__thumbnails">
          <div class="owl-carousel">

            <?php foreach ($product['images'] as $image) { ?>

              <div class="product-gallery__thumbnails-item image image--type--product">
                <div class="image__body">
                  <img class="image__tag" src="<?= $image['thumbnail'] ?? '/images/no-photo.jpg' ?>" alt="">
                </div>
              </div>

            <?php } ?>

          </div>
        </div>
      </div>
      <div class="quickview__product">
        <div class="quickview__product-name">
          <?= $product['name'] ?>
        </div>
        <?php if (0) { ?>
        <div class="quickview__product-rating">
          <div class="quickview__product-rating-stars">
            <div class="rating">
              <div class="rating__body">
                <div class="rating__star rating__star--active"></div>
                <div class="rating__star rating__star--active"></div>
                <div class="rating__star rating__star--active"></div>
                <div class="rating__star"></div>
                <div class="rating__star"></div>
              </div>
            </div>
          </div>
          <div class="quickview__product-rating-title">14 отзывов</div>
        </div>
        <?php } ?>
        <div class="quickview__product-meta">
          <table>
            <?php if (!empty($product['code'])) { ?>
              <tr>
                <th> Артикул</th>
                <td><?= $product['code'] ?></td>
              </tr>
            <?php } ?>
            <?php if (isset($product['brand']) && !empty($product['brand'])) { ?>
              <tr>
                <th> Бренд</th>
                <td> <?= $product['brand']['name'] ?> </td>
              </tr>
            <?php } ?>
            <tr>
              <th> Страна производитель</th>
              <td> <?= $product['manufacturer']['name'] ?> </td>
            </tr>
            <?php if (0) { ?>
              <tr>
                <th> Код поставщика</th>
                <td> BDX-750Z370-S</td>
              </tr>
            <?php } ?>
          </table>
        </div>
        <div class="quickview__product-description">
          <?= $product['description'] ?>
        </div>
        <div class="quickview__product-prices-stock">
          <div class="quickview__product-prices">
            <div class="quickview__product-price"><?= $product['price'] ?> руб.</div>
          </div>
          <div class="status-badge status-badge--style--success quickview__product-stock status-badge--has-text">
            <div class="status-badge__body">
              <div class="status-badge__text">В наличии</div>
            </div>
          </div>
        </div>
        <?php $form = ActiveForm::begin(['id' => 'form-order']); ?>
        <?= $form->field($cartForm, 'product_id')->hiddenInput()->label(false); ?>
        <?php if ($product['colors']) { ?>

        <div class="product-form quickview__product-form">
          <div class="product-form__body">
            <div class="product-form__row">
              <div class="product-form__title">Цвет</div>
              <div class="product-form__control">
                <div class="input-radio-color">
                  <div class="input-radio-color__list">
                    <?php foreach ($product['colors'] as $color) { ?>
                      <label class="input-radio-color__item input-radio-color-button"
                             data-category-id="<?= $product['category_id'] ?>"
                             data-product-id="<?= $product['id'] ?>"
                             data-color-id="<?= $color['id'] ?>"
                             style="color:<?= $color['color'] ?>"
                             data-toggle="tooltip"
                             title="<?= $color['name'] ?>">
                        <input type="radio" name="color_id">
                        <span style="background:<?= $color['color'] ?>" class="<?= $color['default'] ? 'color-border-fill' : '' ?>"></span>
                      </label>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="product-form__row">
              <div class="product-form__title">Размер</div>
              <div class="product-form__control">
                <div class="input-radio-label">
                  <button class="btn btn-light btn-loading btn-sm hide" style="margin:10px"></button>
                  <div class="input-radio-label__list size-list">

                    <?php foreach ($product['colors'] as $color) { ?>
                      <?php foreach ($color['sizes'] as $size) { ?>
                        <label class="input-radio-label__item <?= !$color['default'] ? 'hide' : '' ?>"
                               data-size-id="<?= $size['id'] ?>" data-product-id="<?= $product['id'] ?>">
                          <input type="radio" name="size_id" class="input-radio-label__input">
                          <span
                            class="input-radio-label__title"><?= $size['eu_size'] . ' (' . $size['ru_size'] . ')' ?></span>
                        </label>
                      <?php } ?>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <?php } ?>

        <div class="quickview__product-actions">
          <?php if(0) { ?>
          <div class="quickview__product-actions-item quickview__product-actions-item--quantity">
            <div class="input-number">
              <input class="input-number__input form-control" type="number" min="1" value="1">
              <div class="input-number__add"></div>
              <div class="input-number__sub"></div>
            </div>
          </div>

          <div class="quickview__product-actions-item quickview__product-actions-item--addtocart">
            <button class="btn btn-primary btn-block cart-add <?= Yii::$app->cart->getItem($product['id']) ? 'cart-hide' : '' ?>" data-id="<?= $product['id'] ?>">В корзину</button>
            <button class="btn btn-primary btn-block cart-open <?= Yii::$app->cart->getItem($product['id']) ? '' : 'cart-hide' ?>" id="item<?= $product['id'] ?>">
              В корзине
            </button>

          </div>
          <?php if(0) { ?>
          <div class="quickview__product-actions-item quickview__product-actions-item--wishlist">
            <button class="btn btn-muted btn-icon" type="button">
              <svg width="16" height="16">
                <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />
              </svg>
            </button>
          </div>
          <?php } ?>
          <div class="quickview__product-actions-item quickview__product-actions-item--compare">
            <button class="btn btn-muted btn-icon" type="button">
              <svg width="16" height="16">
                <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
                <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
                <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />
              </svg>
            </button>
          </div>
          <?php } ?>
        </div>
        <?php ActiveForm::end(); ?>
      </div>
    </div>
    <a href="/catalog/<?= $product['category_id'] ?>/<?= $product['id'] ?>" class="quickview__see-details">Перейти к товару</a>
  </div>
</div>

