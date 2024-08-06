<?php

use frontend\components\CatalogFilterHide\CatalogFilterHideWidget;

?>

<div class="sidebar sidebar--offcanvas--always">
  <div class="sidebar__backdrop"></div>
  <div class="sidebar__body">
    <div class="sidebar__header">
      <div class="sidebar__title">Фильтр</div>
      <button class="sidebar__close" type="button">
        <svg width="12" height="12">
          <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
	C11.2,9.8,11.2,10.4,10.8,10.8z"/>
        </svg>
      </button>
    </div>
    <div class="sidebar__content">
      <div class="widget widget-filters widget-filters--offcanvas--always" data-collapse
           data-collapse-opened-class="filter--opened">
        <div class="widget__header widget-filters__header">
          <h4>Фильтр</h4>
        </div>
        <div class="widget-filters__list">
          <? echo CatalogFilterHideWidget::widget(); ?>
          <div class="widget-filters__item">
            <div class="filter filter--opened" data-collapse-item>
              <button type="button" class="filter__title" data-collapse-trigger>
                Транспортное средство

                <span class="filter__arrow">
                  <svg width="12px" height="7px">
                    <path
                      d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/>
                </svg></span>
              </button>
              <div class="filter__body" data-collapse-content>
                <div class="filter__container">
                  <div class="filter-vehicle">
                    <ul class="filter-vehicle__list">
                      <li class="filter-vehicle__item ">
                        <label class="filter-vehicle__item-label">
                          <span class="filter-list__input input-radio">
                              <span class="input-radio__body">
                                  <input class="input-radio__input"
                                         name="filter_vehicle" type="radio">
                                  <span class="input-radio__circle"></span>
                              </span>
                          </span>
                          <span class="filter-vehicle__item-title">
                              Все части
                          </span>
                          <span class="filter-vehicle__item-counter">57</span>
                        </label>
                      </li>
                      <li class="filter-vehicle__item ">
                        <label class="filter-vehicle__item-label">
                          <span class="filter-list__input input-radio">
                              <span class="input-radio__body">
                                  <input class="input-radio__input"
                                         name="filter_vehicle" type="radio"
                                         checked>
                                  <span class="input-radio__circle"></span>
                              </span>
                          </span>
                          <span class="filter-vehicle__item-title">
                              2011 Ford Focus S
                          </span>
                          <span class="filter-vehicle__item-counter">12</span>
                        </label>
                      </li>
                      <li class="filter-vehicle__item ">
                        <label class="filter-vehicle__item-label">
                          <span class="filter-list__input input-radio">
                              <span class="input-radio__body">
                                  <input class="input-radio__input" name="filter_vehicle" type="radio">
                                  <span class="input-radio__circle"></span>
                              </span>
                          </span>
                          <span class="filter-vehicle__item-title">
                              2015 Audi A3
                          </span>
                          <span class="filter-vehicle__item-counter">51</span>
                        </label>
                      </li>
                    </ul>
                    <?php if (0) { ?>
                      <div class="filter-vehicle__button">
                        <button type="button" class="btn btn-xs btn-secondary">Добавить транспортное средство</button>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="widget-filters__item">
            <div class="filter filter--opened" data-collapse-item>
              <button type="button" class="filter__title" data-collapse-trigger>
                Цена
                <span class="filter__arrow">
                  <svg width="12px" height="7px">
                      <path
                        d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/>
                  </svg>
                </span>
              </button>
              <div class="filter__body" data-collapse-content>
                <div class="filter__container">
                  <div class="filter-price" data-min="500" data-max="1500" data-from="590" data-to="1000">
                    <div class="filter-price__slider"></div>
                    <div class="filter-price__title-button">
                      <div class="filter-price__title">$<span class="filter-price__min-value"></span> – $<span
                          class="filter-price__max-value"></span></div>
                      <button type="button" class="btn btn-xs btn-secondary filter-price__button">Фильтр</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="widget-filters__item">
            <div class="filter filter--opened" data-collapse-item>
              <button type="button" class="filter__title" data-collapse-trigger>
                Марка
                <span class="filter__arrow">
                  <svg width="12px" height="7px">
                      <path
                        d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/>
                  </svg>
                </span>
              </button>
              <div class="filter__body" data-collapse-content>
                <div class="filter__container">
                  <div class="filter-list">
                    <div class="filter-list__list">
                      <label class="filter-list__item ">
                        <span class="input-check filter-list__input">
                            <span class="input-check__body">
                                <input class="input-check__input"
                                       type="checkbox">
                                <span class="input-check__box"></span>
                                <span class="input-check__icon">
                                  <svg width="9px" height="7px">
                                      <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                  </svg>
                                </span>
                            </span>
                        </span>
                        <span class="filter-list__title">Wakita</span>
                        <span class="filter-list__counter">7</span>
                      </label>
                      <label class="filter-list__item ">
                        <span class="input-check filter-list__input">
                            <span class="input-check__body">
                                <input class="input-check__input" type="checkbox" checked>
                                <span class="input-check__box"></span>
                                <span class="input-check__icon">
                                  <svg width="9px" height="7px">
                                      <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                  </svg>
                                </span>
                            </span>
                        </span>
                        <span class="filter-list__title">Zosch </span>
                        <span class="filter-list__counter">42</span>
                      </label>
                      <label class="filter-list__item  filter-list__item--disabled ">
                        <span class="input-check filter-list__input">
                            <span class="input-check__body">
                                <input class="input-check__input"
                                       type="checkbox" checked disabled>
                                <span class="input-check__box"></span>
                                <span class="input-check__icon"><svg width="9px"
                                                                     height="7px">
                                        <path
                                          d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                    </svg>
                                </span>
                            </span>
                        </span>
                        <span class="filter-list__title">WeVALT </span>
                      </label>
                      <label class="filter-list__item  filter-list__item--disabled ">
                        <span class="input-check filter-list__input">
                            <span class="input-check__body">
                                <input class="input-check__input"
                                       type="checkbox" disabled>
                                <span class="input-check__box"></span>
                                <span class="input-check__icon"><svg width="9px"
                                                                     height="7px">
                                        <path
                                          d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                    </svg>
                                </span>
                            </span>
                        </span>
                        <span class="filter-list__title">Hammer</span>
                      </label>
                      <label class="filter-list__item ">
                        <span class="input-check filter-list__input">
                            <span class="input-check__body">
                                <input class="input-check__input"
                                       type="checkbox">
                                <span class="input-check__box"></span>
                                <span class="input-check__icon"><svg width="9px"
                                                                     height="7px">
                                        <path
                                          d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                    </svg>
                                </span>
                            </span>
                        </span>
                        <span class="filter-list__title">Mitasia</span>
                        <span class="filter-list__counter">1</span>
                      </label>
                      <label class="filter-list__item ">
                        <span class="input-check filter-list__input">
                            <span class="input-check__body">
                                <input class="input-check__input"
                                       type="checkbox">
                                <span class="input-check__box"></span>
                                <span class="input-check__icon"><svg width="9px"
                                                                     height="7px">
                                        <path
                                          d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                    </svg>
                                </span>
                            </span>
                        </span>
                        <span class="filter-list__title">Metaggo</span>
                        <span class="filter-list__counter">25</span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="widget-filters__item">
            <div class="filter filter--opened" data-collapse-item>
              <button type="button" class="filter__title" data-collapse-trigger>
                Марка
                <span class="filter__arrow">
                  <svg width="12px" height="7px">
                      <path
                        d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/>
                  </svg>
                </span>
              </button>
              <div class="filter__body" data-collapse-content>
                <div class="filter__container">
                  <div class="filter-list">
                    <div class="filter-list__list">
                      <label class="filter-list__item ">
                        <span class="filter-list__input input-radio">
                            <span class="input-radio__body">
                                <input class="input-radio__input"
                                       name="filter_radio" type="radio">
                                <span class="input-radio__circle"></span>
                            </span>
                        </span>
                        <span class="filter-list__title"> Wakita </span>
                        <span class="filter-list__counter">7</span>
                      </label>
                      <label class="filter-list__item ">
                        <span class="filter-list__input input-radio">
                            <span class="input-radio__body">
                                <input class="input-radio__input"
                                       name="filter_radio" type="radio">
                                <span class="input-radio__circle"></span>
                            </span>
                        </span>
                        <span class="filter-list__title">Zosch </span>
                        <span class="filter-list__counter">42</span>
                      </label>
                      <label class="filter-list__item  filter-list__item--disabled ">
                        <span class="filter-list__input input-radio">
                            <span class="input-radio__body">
                                <input class="input-radio__input"
                                       name="filter_radio" type="radio" checked
                                       disabled>
                                <span class="input-radio__circle"></span>
                            </span>
                        </span>
                        <span class="filter-list__title">WeVALT</span>
                      </label>
                      <label class="filter-list__item  filter-list__item--disabled ">
                        <span class="filter-list__input input-radio">
                            <span class="input-radio__body">
                                <input class="input-radio__input"
                                       name="filter_radio" type="radio"
                                       disabled>
                                <span class="input-radio__circle"></span>
                            </span>
                        </span>
                        <span class="filter-list__title">Hammer</span>
                      </label>
                      <label class="filter-list__item ">
                        <span class="filter-list__input input-radio">
                            <span class="input-radio__body">
                                <input class="input-radio__input"
                                       name="filter_radio" type="radio">
                                <span class="input-radio__circle"></span>
                            </span>
                        </span>
                        <span class="filter-list__title">Mitasia</span>
                        <span class="filter-list__counter">1</span>
                      </label>
                      <label class="filter-list__item ">
                        <span class="filter-list__input input-radio">
                            <span class="input-radio__body">
                                <input class="input-radio__input"
                                       name="filter_radio" type="radio">
                                <span class="input-radio__circle"></span>
                            </span>
                        </span>
                        <span class="filter-list__title">Metaggo</span>
                        <span class="filter-list__counter">25</span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="widget-filters__item">
            <div class="filter filter--opened" data-collapse-item>
              <button type="button" class="filter__title" data-collapse-trigger>
                Рейтинг
                <span class="filter__arrow">
                  <svg width="12px" height="7px">
                      <path
                        d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/>
                  </svg>
                </span>
              </button>
              <div class="filter__body" data-collapse-content>
                <div class="filter__container">
                  <div class="filter-rating">
                    <ul class="filter-rating__list">
                      <li class="filter-rating__item">
                        <label class="filter-rating__item-label">
                          <span class="input-check filter-rating__item-input">
                              <span class="input-check__body">
                                  <input class="input-check__input"
                                         type="checkbox">
                                  <span class="input-check__box"></span>
                                  <span class="input-check__icon"><svg
                                      width="9px" height="7px">
                                          <path
                                            d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                      </svg>
                                  </span>
                              </span>
                          </span>
                          <span class="filter-rating__item-звезды">
                            <div class="rating">
                                <div class="rating__body">
                                    <div class="rating__star rating__star--active"></div>
                                    <div class="rating__star rating__star--active"></div>
                                    <div class="rating__star rating__star--active"></div>
                                    <div class="rating__star rating__star--active"></div>
                                    <div class="rating__star rating__star--active"></div>
                                </div>
                            </div>
                          </span>
                          <span class="filter-rating__item-title sr-only">5 звезды</span>
                          <span class="filter-rating__item-counter">42</span>
                        </label>
                      </li>
                      <li class="filter-rating__item">
                        <label class="filter-rating__item-label">
                          <span class="input-check filter-rating__item-input">
                              <span class="input-check__body">
                                  <input class="input-check__input"
                                         type="checkbox">
                                  <span class="input-check__box"></span>
                                  <span class="input-check__icon"><svg
                                      width="9px" height="7px">
                                          <path
                                            d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                      </svg>
                                  </span>
                              </span>
                          </span>
                          <span class="filter-rating__item-звезды">
                              <div class="rating">
                                  <div class="rating__body">
                                      <div
                                        class="rating__star rating__star--active"></div>
                                      <div
                                        class="rating__star rating__star--active"></div>
                                      <div
                                        class="rating__star rating__star--active"></div>
                                      <div
                                        class="rating__star rating__star--active"></div>
                                      <div class="rating__star"></div>
                                  </div>
                              </div>
                          </span>
                          <span class="filter-rating__item-title sr-only">
                              4 звезды
                          </span>
                          <span class="filter-rating__item-counter">24</span>
                        </label>
                      </li>
                      <li class="filter-rating__item">
                        <label class="filter-rating__item-label">
                          <span class="input-check filter-rating__item-input">
                              <span class="input-check__body">
                                  <input class="input-check__input"
                                         type="checkbox">
                                  <span class="input-check__box"></span>
                                  <span class="input-check__icon"><svg
                                      width="9px" height="7px">
                                          <path
                                            d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                      </svg>
                                  </span>
                              </span>
                          </span>
                          <span class="filter-rating__item-звезды">
                              <div class="rating">
                                  <div class="rating__body">
                                      <div
                                        class="rating__star rating__star--active"></div>
                                      <div
                                        class="rating__star rating__star--active"></div>
                                      <div
                                        class="rating__star rating__star--active"></div>
                                      <div class="rating__star"></div>
                                      <div class="rating__star"></div>
                                  </div>
                              </div>
                          </span>
                          <span class="filter-rating__item-title sr-only">
                                                                        3 звезды
                                                                    </span>
                          <span class="filter-rating__item-counter">19</span>
                        </label>
                      </li>
                      <li class="filter-rating__item">
                        <label class="filter-rating__item-label">
                          <span class="input-check filter-rating__item-input">
                              <span class="input-check__body">
                                  <input class="input-check__input"
                                         type="checkbox">
                                  <span class="input-check__box"></span>
                                  <span class="input-check__icon"><svg
                                      width="9px" height="7px">
                                          <path
                                            d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                      </svg>
                                  </span>
                              </span>
                          </span>
                          <span class="filter-rating__item-звезды">
                              <div class="rating">
                                  <div class="rating__body">
                                      <div
                                        class="rating__star rating__star--active"></div>
                                      <div
                                        class="rating__star rating__star--active"></div>
                                      <div class="rating__star"></div>
                                      <div class="rating__star"></div>
                                      <div class="rating__star"></div>
                                  </div>
                              </div>
                          </span>
                          <span class="filter-rating__item-title sr-only">
                              2 звезды
                          </span>
                          <span class="filter-rating__item-counter">3</span>
                        </label>
                      </li>
                      <li class="filter-rating__item">
                        <label class="filter-rating__item-label">
                          <span class="input-check filter-rating__item-input">
                              <span class="input-check__body">
                                  <input class="input-check__input"
                                         type="checkbox">
                                  <span class="input-check__box"></span>
                                  <span class="input-check__icon"><svg
                                      width="9px" height="7px">
                                          <path
                                            d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>
                                      </svg>
                                  </span>
                              </span>
                          </span>
                          <span class="filter-rating__item-звезды">
                              <div class="rating">
                                  <div class="rating__body">
                                      <div
                                        class="rating__star rating__star--active"></div>
                                      <div class="rating__star"></div>
                                      <div class="rating__star"></div>
                                      <div class="rating__star"></div>
                                      <div class="rating__star"></div>
                                  </div>
                              </div>
                          </span>
                          <span class="filter-rating__item-title sr-only">
                              1 star
                          </span>
                          <span class="filter-rating__item-counter">12</span>
                        </label>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="widget-filters__item">
            <div class="filter filter--opened" data-collapse-item>
              <button type="button" class="filter__title" data-collapse-trigger>
                Color
                <span class="filter__arrow"><svg width="12px" height="7px">
                                                        <path
                                                          d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/>
                                                    </svg></span>
              </button>
              <div class="filter__body" data-collapse-content>
                <div class="filter__container">
                  <div class="filter-color">
                    <div class="filter-color__list">
                      <label class="filter-color__item">
                                                                <span
                                                                  class="filter-color__check input-check-color  input-check-color--white  "
                                                                  style="color: #fff;">
                                                                    <label class="input-check-color__body">
                                                                        <input class="input-check-color__input"
                                                                               type="checkbox">
                                                                        <span class="input-check-color__box"></span>
                                                                        <span class="input-check-color__icon"><svg
                                                                            width="12px" height="9px">
                                                                                <path
                                                                                  d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                                                            </svg></span>
                                                                        <span class="input-check-color__stick"></span>
                                                                    </label>
                                                                </span>
                      </label>
                      <label class="filter-color__item">
                                                                <span
                                                                  class="filter-color__check input-check-color   input-check-color--light "
                                                                  style="color: #d9d9d9;">
                                                                    <label class="input-check-color__body">
                                                                        <input class="input-check-color__input"
                                                                               type="checkbox">
                                                                        <span class="input-check-color__box"></span>
                                                                        <span class="input-check-color__icon"><svg
                                                                            width="12px" height="9px">
                                                                                <path
                                                                                  d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                                                            </svg></span>
                                                                        <span class="input-check-color__stick"></span>
                                                                    </label>
                                                                </span>
                      </label>
                      <label class="filter-color__item">
                                                                <span class="filter-color__check input-check-color  "
                                                                      style="color: #b3b3b3;">
                                                                    <label class="input-check-color__body">
                                                                        <input class="input-check-color__input"
                                                                               type="checkbox">
                                                                        <span class="input-check-color__box"></span>
                                                                        <span class="input-check-color__icon"><svg
                                                                            width="12px" height="9px">
                                                                                <path
                                                                                  d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                                                            </svg></span>
                                                                        <span class="input-check-color__stick"></span>
                                                                    </label>
                                                                </span>
                      </label>
                      <label class="filter-color__item">
                                                                <span class="filter-color__check input-check-color  "
                                                                      style="color: #808080;">
                                                                    <label class="input-check-color__body">
                                                                        <input class="input-check-color__input"
                                                                               type="checkbox">
                                                                        <span class="input-check-color__box"></span>
                                                                        <span class="input-check-color__icon"><svg
                                                                            width="12px" height="9px">
                                                                                <path
                                                                                  d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                                                            </svg></span>
                                                                        <span class="input-check-color__stick"></span>
                                                                    </label>
                                                                </span>
                      </label>
                      <label class="filter-color__item">
                                                                <span class="filter-color__check input-check-color  "
                                                                      style="color: #666;">
                                                                    <label class="input-check-color__body">
                                                                        <input class="input-check-color__input"
                                                                               type="checkbox">
                                                                        <span class="input-check-color__box"></span>
                                                                        <span class="input-check-color__icon"><svg
                                                                            width="12px" height="9px">
                                                                                <path
                                                                                  d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                                                            </svg></span>
                                                                        <span class="input-check-color__stick"></span>
                                                                    </label>
                                                                </span>
                      </label>
                      <label class="filter-color__item">
                                                                <span class="filter-color__check input-check-color  "
                                                                      style="color: #4d4d4d;">
                                                                    <label class="input-check-color__body">
                                                                        <input class="input-check-color__input"
                                                                               type="checkbox">
                                                                        <span class="input-check-color__box"></span>
                                                                        <span class="input-check-color__icon"><svg
                                                                            width="12px" height="9px">
                                                                                <path
                                                                                  d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                                                            </svg></span>
                                                                        <span class="input-check-color__stick"></span>
                                                                    </label>
                                                                </span>
                      </label>
                      <label class="filter-color__item">
                                                                <span class="filter-color__check input-check-color  "
                                                                      style="color: #262626;">
                                                                    <label class="input-check-color__body">
                                                                        <input class="input-check-color__input"
                                                                               type="checkbox">
                                                                        <span class="input-check-color__box"></span>
                                                                        <span class="input-check-color__icon"><svg
                                                                            width="12px" height="9px">
                                                                                <path
                                                                                  d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                                                            </svg></span>
                                                                        <span class="input-check-color__stick"></span>
                                                                    </label>
                                                                </span>
                      </label>
                      <label class="filter-color__item">
                                                                <span class="filter-color__check input-check-color  "
                                                                      style="color: #ff4040;">
                                                                    <label class="input-check-color__body">
                                                                        <input class="input-check-color__input"
                                                                               type="checkbox" checked>
                                                                        <span class="input-check-color__box"></span>
                                                                        <span class="input-check-color__icon"><svg
                                                                            width="12px" height="9px">
                                                                                <path
                                                                                  d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                                                            </svg></span>
                                                                        <span class="input-check-color__stick"></span>
                                                                    </label>
                                                                </span>
                      </label>
                      <label class="filter-color__item">
                        <span class="filter-color__check input-check-color  "
                              style="color: #ff8126;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox">
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                      </label>
                      <label class="filter-color__item">
                        <span
                          class="filter-color__check input-check-color   input-check-color--light "
                          style="color: #ffd440;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox">
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                      </label>
                      <label class="filter-color__item">
                        <span
                          class="filter-color__check input-check-color   input-check-color--light "
                          style="color: #becc1f;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox">
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                      </label>
                      <label class="filter-color__item">
                        <span class="filter-color__check input-check-color  "
                              style="color: #8fcc14;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox" checked>
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                      </label>
                      <label class="filter-color__item">
                        <span class="filter-color__check input-check-color  "
                              style="color: #47cc5e;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox">
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                      </label>
                      <label class="filter-color__item">
                        <span class="filter-color__check input-check-color"
                              style="color: #47cca0;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox">
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                      </label>
                      <label class="filter-color__item">
                        <span class="filter-color__check input-check-color"
                              style="color: #47cccc;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox">
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                      </label>
                      <label class="filter-color__item">
                        <span class="filter-color__check input-check-color"
                              style="color: #40bfff;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox" disabled>
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                      </label>
                      <label class="filter-color__item">
                        <span class="filter-color__check input-check-color"
                              style="color: #3d6dcc;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox" checked>
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                      </label>
                      <label class="filter-color__item">
                        <span class="filter-color__check input-check-color"
                              style="color: #7766cc;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox">
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                      </label>
                      <label class="filter-color__item">
                        <span class="filter-color__check input-check-color"
                              style="color: #b852cc;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox">
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                      </label>
                      <label class="filter-color__item">
                        <span class="filter-color__check input-check-color"
                              style="color: #e53981;">
                            <label class="input-check-color__body">
                                <input class="input-check-color__input"
                                       type="checkbox">
                                <span class="input-check-color__box"></span>
                                <span class="input-check-color__icon"><svg
                                    width="12px" height="9px">
                                        <path
                                          d="M12.002,1.396 L4.461,9.002 L-0.002,4.498 L1.383,3.096 L4.461,6.203 L10.617,-0.006 L12.002,1.396 Z"/>
                                    </svg></span>
                                <span class="input-check-color__stick"></span>
                            </label>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="widget-filters__actions d-flex">
          <button class="btn btn-primary btn-sm">Применить</button>
          <button class="btn btn-secondary btn-sm">Очистить</button>
        </div>
      </div>
    </div>
  </div>
</div>


