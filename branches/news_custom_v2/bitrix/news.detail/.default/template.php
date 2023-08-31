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

<body>
<div class="article-card">

    <?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
        <div class="article-card__title"><?=$arResult["NAME"]?></div>
    <?endif;?>
    <?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
        <span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
    <?endif;?>
    <?foreach($arResult["FIELDS"] as $code=>$value):
        if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code)
        {
            ?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?
            if (!empty($value) && is_array($value))
            {
                ?><img border="0" src="<?=$value["SRC"]?>" width="<?=$value["WIDTH"]?>" height="<?=$value["HEIGHT"]?>"><?
            }
        }
        else
        {
            ?>
            <div class="article-card__date">
                <?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
            </div>
            <?
        }
        ?><br />
    <?endforeach;
    foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
        <?=$arProperty["NAME"]?>:
        <?if(is_array($arProperty["DISPLAY_VALUE"])):?>
            <?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
            <?echo 'if' . $arProperty["DISPLAY_VALUE"]?>
        <?else:?>
            <?=$arProperty["DISPLAY_VALUE"];?>
            <?echo 'else' . $arProperty["DISPLAY_VALUE"]?>
        <?endif?>
        <br />
    <?endforeach;
    if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
    {
        ?>
        <div class="news-detail-share">
            <noindex>
                <?
                $APPLICATION->IncludeComponent("bitrix:main.share", "", array(
                    "HANDLERS" => $arParams["SHARE_HANDLERS"],
                    "PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
                    "PAGE_TITLE" => $arResult["~NAME"],
                    "SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
                    "SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
                    "HIDE" => $arParams["SHARE_HIDE"],
                ),
                    $component,
                    array("HIDE_ICONS" => "Y")
                );
                ?>
            </noindex>
        </div>
        <?
    }
    ?>
    <div class="article-card__content">
        <div class="article-card__image sticky">
            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
                <img
                        class="detail_picture"
                        border="0"
                        src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
                        width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
                        height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
                        alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
                        title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
                        data-object-fit="cover"
                />
            <?endif?>
        </div>
        <div class="article-card__text">
            <div class="block-content" data-anim="anim-3">
                <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && ($arResult["FIELDS"]["PREVIEW_TEXT"] ?? '')):?>
                    <p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
                <?endif;?>
                <?if($arResult["NAV_RESULT"]):?>
                    <?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
                    <?echo $arResult["NAV_TEXT"];?>
                    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
                <?elseif($arResult["DETAIL_TEXT"] <> ''):?>
                    <?echo $arResult["DETAIL_TEXT"];?>
                <?else:?>
                    <?echo $arResult["PREVIEW_TEXT"];?>
                <?endif?>
                <div style="clear:both"></div>
            </div>
        </div>
            <br />
    </div>
</div>
</body>