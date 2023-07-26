<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

    <?if($arParams["DISPLAY_TOP_PAGER"]):?>
        <?=$arResult["NAV_STRING"]?><br />
    <?endif;?>
    <body>
        <div id="barba-wrapper">
            <div class="article-list">
                <?foreach($arResult["ITEMS"] as $arItem):?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                        array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <a class="article-item article-list__item" data-anim="anim-3">
                        <p class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                                <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                                    <div class="article-item__background"><img
                                                src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"

                                                alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                                                title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                                    /></div></a>
                                <?else:?>
                                    <div class="article-item__background">
                                    <img
                                            src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"

                                            alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                                            title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"

                                    /></div>
                                <?endif;?>
                            <?endif?>
                            <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                                <span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
                            <?endif?>
                            <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                                <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                                    <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
                                <?else:?>
                                    <b><?echo $arItem["NAME"]?></b><br />
                                <?endif;?>
                            <?endif;?>
                            <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                                <?echo $arItem["PREVIEW_TEXT"];?>
                            <?endif;?>
                            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                                <div style="clear:both"></div>
                                    <?echo "тут DISPLAY_PICTURE"?>
                            <?endif?>
                            <?foreach($arItem["FIELDS"] as $code=>$value):?>
                                <small>
                                    <?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
                                </small><br />
                            <?endforeach;?>
                            <?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
                                <small>
                                    <?=$arProperty["NAME"]?>:&nbsp;
                                    <?if(is_array($arProperty["DISPLAY_VALUE"])):?>
                                        <?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
                                    <?else:?>
                                        <?=$arProperty["DISPLAY_VALUE"];?>
                                    <?endif?>
                                </small><br />
                            <?endforeach;?>
                        </p>
                    </a>
                <?endforeach;?>
        </div>
    </div>
</body>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>


____________________________________________________index

<div id="barba-wrapper">
    <div class="article-list"><a class="article-item article-list__item" href="for-individuals.html"
                                 data-anim="anim-3">
            <div class="article-item__background"><img src="<?echo $templateFolder ?>/images/article-item-bg-6.jpg"
                                                       data-src="xxxHTMLLINKxxx0.39186223192351520.41491856731872767xxx"
                                                       alt=""/></div>
            <div class="article-item__wrapper">
                <div class="article-item__title">Для физических лиц</div>
                <div class="article-item__content">Лучшие решения для вашего дома: быстрый интернет, доступное кабельное&nbsp;TV,
                    удобный домашний телефон
                </div>
            </div>
        </a><a class="article-item article-list__item" href="#" data-anim="anim-3">
            <div class="article-item__background"><img src="<?echo $templateFolder ?>/images/article-item-bg-3.jpg"
                                                       data-src="xxxHTMLLINKxxx0.153709056148504830.8920151245249737xxx"
                                                       alt=""/></div>
            <div class="article-item__wrapper">
                <div class="article-item__title">Средний и малый бизнес</div>
                <div class="article-item__content">Быстро и&nbsp;качественно помогаем предпринимателям в&nbsp;решении
                    бизнес-задач
                </div>
            </div>
        </a><a class="article-item article-list__item" href="for-state.html" data-anim="anim-3">
            <div class="article-item__background"><img src="<?echo $templateFolder ?>/images/article-item-bg-4.jpg"
                                                       data-src="xxxHTMLLINKxxx0.83331501539025420.9635873669140569xxx"
                                                       alt=""/></div>
            <div class="article-item__wrapper">
                <div class="article-item__title">Государственные заказчики</div>
                <div class="article-item__content">Решения для государственных структур, повышение безопасности и&nbsp;комфорта
                    городской среды
                </div>
            </div>
        </a><a class="article-item article-list__item" href="for-federals.html" data-anim="anim-3">
            <div class="article-item__background"><img src="<?echo $templateFolder ?>/images/article-item-bg-5.jpg"
                                                       data-src="xxxHTMLLINKxxx0.274858315149753230.570917169144997xxx"
                                                       alt=""/></div>
            <div class="article-item__wrapper">
                <div class="article-item__title">Федеральные клиенты</div>
                <div class="article-item__content">Повышаем эффективность бизнес-процессов за&nbsp;счет внедрения
                    современных средств передачи и&nbsp;защиты данных
                </div>
            </div>
        </a><a class="article-item article-list__item" href="for-telecommunications.html" data-anim="anim-3">
            <div class="article-item__background"><img src="<?echo $templateFolder ?>/images/article-item-bg-2.jpg"
                                                       data-src="xxxHTMLLINKxxx0.4314468597192560.505419651272456xxx"
                                                       alt=""/></div>
            <div class="article-item__wrapper">
                <div class="article-item__title">Операторы связи</div>
                <div class="article-item__content">Предлагаем партнерство и&nbsp;взаимовыгодное сотрудничество</div>
            </div>
        </a><a class="article-item article-list__item" href="innovative-projects.html" data-anim="anim-3">
            <div class="article-item__background"><img src="<?echo $templateFolder ?>/images/article-item-bg-1.jpg"
                                                       data-src="xxxHTMLLINKxxx0.2544727135416540.7321213588928357xxx"
                                                       alt=""/></div>
            <div class="article-item__wrapper">
                <div class="article-item__title">Инновационные проекты</div>
                <div class="article-item__content">Предоставляем услуги широкополосного доступа в&nbsp;интернет и&nbsp;комплексные
                    решения на&nbsp;базе технологий промышленного интернета вещей (IoT)
                </div>
            </div>
        </a></div>
</div>

---------------------------------------------experimental
    <div id="barba-wrapper">
        <div class="article-list">
            <a class="article-item article-list__item" href="for-individuals.html"
               data-anim="anim-3">
                <div class="article-item__background">
                    <img src="<?echo $templateFolder ?>/images/article-item-bg-6.jpg"
                         data-src="xxxHTMLLINKxxx0.39186223192351520.41491856731872767xxx"
                         alt=""/>
                </div>
                <div class="article-item__wrapper">
                    <div class="article-item__title"><?echo $arItem["PREVIEW_PICTURE"]["TITLE"]?></div>
                    <div class="article-item__content"><?echo $arItem["PREVIEW_TEXT"]?>
                    </div>
                </div>
            </a>
        </div>
    </div>
<br>
<?echo 'arItem["PREVIEW_PICTURE"]["TITLE"] = ' . $arItem["PREVIEW_PICTURE"]["TITLE"]?>
<br>
<?echo '$arItem["PREVIEW_TEXT"] = ' . $arItem["PREVIEW_TEXT"]?>

