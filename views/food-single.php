<?php include(BASE_DOMAIN . '/views/header.php');?>

  <!-- Основной контент странички -->
  <div class="page single-page-food">
    <div class="page-content container-fluid">
      <div class="row page-info-food">

        <div class="col-xs-13">
          <ul class="breadcrumbs">
            <li><a href="food.html">Питание</a></li>
            <li class="active">Строгий режим</li>
          </ul>
        </div>

        <div class="col-xs-13">
          <h1 class="page-title">Строгий режим</h1>
        </div>
      </div>

      <div class="row page-text-content">
        <div class="col-xs-13">
          <a href="single-rules-edit.html" class="btn-default waves waves-effect waves-light right-position">Изменить</a>
        </div>

        <!-- Табы -->
        <div class="col-xs-13 tabs">
          <ul class="tabs__caption">
            <li class="active">
              <span class="short-name">пн</span>
              <span class="full-name">Понедельник</span>
            </li>
            <li>
              <span class="short-name">вт</span>
              <span class="full-name">Вторник</span>
            </li>
            <li>
              <span class="short-name">ср</span>
              <span class="full-name">Среда</span>
            </li>
            <li>
              <span class="short-name">чт</span>
              <span class="full-name">Четверг</span>
            </li>
            <li>
              <span class="short-name">пт</span>
              <span class="full-name">Пятница</span>
            </li>
            <li>
              <span class="short-name">сб</span>
              <span class="full-name">Суббота</span>
            </li>
            <li>
              <span class="short-name">вс</span>
              <span class="full-name">Воскресенье</span>
            </li>
          </ul>

          <div class="tabs__content active">
            <div class="table-content-food">
              <div class="table-row">
                <div class="table-th table-icon"></div>
                <div class="table-th table-elements">Макроэлементы</div>
                <div class="table-th table-product">Продукты</div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-breakfast"><p>Завтрак</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Простые углеводы</li>
                    <li>Сложные углеводы</li>
                    <li>Белки</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Овсяноблин, шпинат, огурец, помидор, чолула или табаско</p>
                  <a href="#" class="btn-modal btn-flat waves-effect waves-grey" data-toggle="modal" data-target="#modalFood">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-snack"><p>перекус 1</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Жиры</li>
                    <li>Клетчатка по желанию</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Протеин-изолят на воде (200 мл воды на один мерный черпак изолята) + 15 миндальных орехов (или кешью) орехи только сырые, не жареные, чтобы в составе не было соли, масел и тд.</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-lunch"><p>Обед</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Сложные углеводы</li>
                    <li>Клетчатка (овощи)</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Гребешки, томат, анис, кинза, рис</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-snack"><p>Перекус 2</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Клетчатка</li>
                    <li>Простые углеводы</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Тунец, помидор, сельдерей, шпинат</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-dinner"><p>Ужин</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Жиры</li>
                    <li>Клетчатка</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Грудка, шпинат, авокадо</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>
            </div>
          </div>

          <div class="tabs__content">
            <div class="table-content-food">
              <div class="table-row">
                <div class="table-th table-icon"></div>
                <div class="table-th table-elements">Макроэлементы</div>
                <div class="table-th table-product">Продукты</div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-breakfast"><p>Завтрак</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Простые углеводы</li>
                    <li>Сложные углеводы</li>
                    <li>Белки</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Овсяноблин, шпинат, огурец, помидор, чолула или табаско</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-snack"><p>перекус 1</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Жиры</li>
                    <li>Клетчатка по желанию</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Протеин-изолят на воде (200 мл воды на один мерный черпак изолята) + 15 миндальных орехов (или кешью) орехи только сырые, не жареные, чтобы в составе не было соли, масел и тд.</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-lunch"><p>Обед</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Сложные углеводы</li>
                    <li>Клетчатка (овощи)</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Гребешки, томат, анис, кинза, рис</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-snack"><p>Перекус 2</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Клетчатка</li>
                    <li>Простые углеводы</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Тунец, помидор, сельдерей, шпинат</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-dinner"><p>Ужин</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Жиры</li>
                    <li>Клетчатка</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Грудка, шпинат, авокадо</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>
            </div>
          </div>

          <div class="tabs__content">
            <div class="table-content-food">
              <div class="table-row">
                <div class="table-th table-icon"></div>
                <div class="table-th table-elements">Макроэлементы</div>
                <div class="table-th table-product">Продукты</div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-breakfast"><p>Завтрак</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Простые углеводы</li>
                    <li>Сложные углеводы</li>
                    <li>Белки</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Овсяноблин, шпинат, огурец, помидор, чолула или табаско</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-snack"><p>перекус 1</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Жиры</li>
                    <li>Клетчатка по желанию</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Протеин-изолят на воде (200 мл воды на один мерный черпак изолята) + 15 миндальных орехов (или кешью) орехи только сырые, не жареные, чтобы в составе не было соли, масел и тд.</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-lunch"><p>Обед</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Сложные углеводы</li>
                    <li>Клетчатка (овощи)</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Гребешки, томат, анис, кинза, рис</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-snack"><p>Перекус 2</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Клетчатка</li>
                    <li>Простые углеводы</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Тунец, помидор, сельдерей, шпинат</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-dinner"><p>Ужин</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Жиры</li>
                    <li>Клетчатка</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Грудка, шпинат, авокадо</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>
            </div>
          </div>

          <div class="tabs__content">
            <div class="table-content-food">
              <div class="table-row">
                <div class="table-th table-icon"></div>
                <div class="table-th table-elements">Макроэлементы</div>
                <div class="table-th table-product">Продукты</div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-breakfast"><p>Завтрак</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Простые углеводы</li>
                    <li>Сложные углеводы</li>
                    <li>Белки</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Овсяноблин, шпинат, огурец, помидор, чолула или табаско</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-snack"><p>перекус 1</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Жиры</li>
                    <li>Клетчатка по желанию</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Протеин-изолят на воде (200 мл воды на один мерный черпак изолята) + 15 миндальных орехов (или кешью) орехи только сырые, не жареные, чтобы в составе не было соли, масел и тд.</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-lunch"><p>Обед</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Сложные углеводы</li>
                    <li>Клетчатка (овощи)</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Гребешки, томат, анис, кинза, рис</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-snack"><p>Перекус 2</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Клетчатка</li>
                    <li>Простые углеводы</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Тунец, помидор, сельдерей, шпинат</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-dinner"><p>Ужин</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Жиры</li>
                    <li>Клетчатка</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Грудка, шпинат, авокадо</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>
            </div>
          </div>

          <div class="tabs__content">
            <div class="table-content-food">
              <div class="table-row">
                <div class="table-th table-icon"></div>
                <div class="table-th table-elements">Макроэлементы</div>
                <div class="table-th table-product">Продукты</div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-breakfast"><p>Завтрак</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Простые углеводы</li>
                    <li>Сложные углеводы</li>
                    <li>Белки</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Овсяноблин, шпинат, огурец, помидор, чолула или табаско</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-snack"><p>перекус 1</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Жиры</li>
                    <li>Клетчатка по желанию</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Протеин-изолят на воде (200 мл воды на один мерный черпак изолята) + 15 миндальных орехов (или кешью) орехи только сырые, не жареные, чтобы в составе не было соли, масел и тд.</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-lunch"><p>Обед</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Сложные углеводы</li>
                    <li>Клетчатка (овощи)</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Гребешки, томат, анис, кинза, рис</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-snack"><p>Перекус 2</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Клетчатка</li>
                    <li>Простые углеводы</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Тунец, помидор, сельдерей, шпинат</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-dinner"><p>Ужин</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Жиры</li>
                    <li>Клетчатка</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Грудка, шпинат, авокадо</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>
            </div>
          </div>

          <div class="tabs__content">
            <div class="table-content-food">
              <div class="table-row">
                <div class="table-th table-icon"></div>
                <div class="table-th table-elements">Макроэлементы</div>
                <div class="table-th table-product">Продукты</div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-breakfast"><p>Завтрак</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Простые углеводы</li>
                    <li>Сложные углеводы</li>
                    <li>Белки</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Овсяноблин, шпинат, огурец, помидор, чолула или табаско</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-snack"><p>перекус 1</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Жиры</li>
                    <li>Клетчатка по желанию</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Протеин-изолят на воде (200 мл воды на один мерный черпак изолята) + 15 миндальных орехов (или кешью) орехи только сырые, не жареные, чтобы в составе не было соли, масел и тд.</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-lunch"><p>Обед</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Сложные углеводы</li>
                    <li>Клетчатка (овощи)</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Гребешки, томат, анис, кинза, рис</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-snack"><p>Перекус 2</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Клетчатка</li>
                    <li>Простые углеводы</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Тунец, помидор, сельдерей, шпинат</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-dinner"><p>Ужин</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Жиры</li>
                    <li>Клетчатка</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Грудка, шпинат, авокадо</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>
            </div>
          </div>

          <div class="tabs__content">
            <div class="table-content-food">
              <div class="table-row">
                <div class="table-th table-icon"></div>
                <div class="table-th table-elements">Макроэлементы</div>
                <div class="table-th table-product">Продукты</div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-breakfast"><p>Завтрак</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Простые углеводы</li>
                    <li>Сложные углеводы</li>
                    <li>Белки</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Овсяноблин, шпинат, огурец, помидор, чолула или табаско</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-snack"><p>перекус 1</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Жиры</li>
                    <li>Клетчатка по желанию</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Протеин-изолят на воде (200 мл воды на один мерный черпак изолята) + 15 миндальных орехов (или кешью) орехи только сырые, не жареные, чтобы в составе не было соли, масел и тд.</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-lunch"><p>Обед</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Сложные углеводы</li>
                    <li>Клетчатка (овощи)</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Гребешки, томат, анис, кинза, рис</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-snack"><p>Перекус 2</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Клетчатка</li>
                    <li>Простые углеводы</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Тунец, помидор, сельдерей, шпинат</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>

              <div class="table-row">
                <div class="table-td table-icon icon-dinner"><p>Ужин</p></div>
                <div class="table-td table-elements">
                  <ul>
                    <li>Белки</li>
                    <li>Жиры</li>
                    <li>Клетчатка</li>
                  </ul>
                </div>
                <div class="table-td table-product">
                  <p>Грудка, шпинат, авокадо</p>
                  <a href="#" class="btn-flat waves-effect waves-grey">рецепт</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end Табы -->

      </div>

      <div class="row page-text-comments">
        <div class="col-xs-13 col-md-9">
          <h3>КОММЕНТАРИИ</h3>
          <p>На заключительные 4 недели рацион питания жестче. <br> Соль можно убрать. <br>Пить по-прежнему 2 литра воды + чай, кофе. <br> Сахарозаменитель Stevia или фитпарад. <br> Из специй оставляем - корицу, черный и красный перец, лавровый лист.</p>

          <p>Овощи: <br>
          Брокколи, цветная или брюссельская капуста, огурцы, болгарский перец, сельдерей, шпинат, спаржа, любые листовые салаты, зелень кроме зеленого лука.</p>

          <p>Фрукты: <br>
          Только зеленое яблоко или грейпфрут</p>
        </div>
      </div>
    </div>
  </div>
  <!-- End Основной контент странички -->

<?php include(BASE_DOMAIN . '/views/footer.php');?>