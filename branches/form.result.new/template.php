<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>

<div class="contact-form">
    <div class="contact-form__head">
    <?if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y")
        {
    ?>
<?
/***********************************************************************************
form header
***********************************************************************************/
?>
        <?if ($arResult["isFormTitle"])
            {
        ?>
            <div class="contact-form__head-title"><?=$arResult["FORM_TITLE"]?></div>
            <?
            } //endif ;
            if ($arResult["isFormImage"] == "Y")
            {
            ?>
                <a href="<?=$arResult["FORM_IMAGE"]["URL"]?>" target="_blank" alt="<?=GetMessage("FORM_ENLARGE")?>">
                    <img src="<?=$arResult["FORM_IMAGE"]["URL"]?>" <?if($arResult["FORM_IMAGE"]["WIDTH"] > 300):?>
                        width="300"<?elseif($arResult["FORM_IMAGE"]["HEIGHT"] > 200):?>height="200"<?else:?>
                        <?=$arResult["FORM_IMAGE"]["ATTR"]?><?endif;?> hspace="3" vscape="3" border="0" />
                </a>
            <?
            } //endif
            ?>
            <div class="contact-form__head-text"><?=$arResult["FORM_DESCRIPTION"]?></div>
            <?
        } // endif
        ?>
    </div>
<?
/***********************************************************************************
form questions
 ***********************************************************************************/
?>
<div class="contact-form__form">
    <div class="contact-form__form-inputs">
        <?
        foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
        {
            if (str_contains($arQuestion["CAPTION"], 'Сообщение')) {
                break;
                }
            ?>
            <div class="input contact-form__input">
                <label class="input__label">
                        <?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
                            <span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
                        <?endif;?>
                    <div class="input__label-text">
                        <?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
                    </div>
                        <?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
                        <?=str_replace('class="inputtext"', 'class="input__input"', $arQuestion["HTML_CODE"])?>
                    <div class="input__notification">Поле должно содержать не менее 3-х символов </div>
                </label>
            </div>
            <?
        } //endwhile
        ?>
        </div>
        <div class="contact-form__form-message">
            <div class="input">
                <label class="input__label">
                    <?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
                        <span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
                    <?endif;?>
                    <div class="input__label-text">
                        <?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
                    </div>
                        <?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
                    <?=str_replace('class="inputtextarea"', 'class="input__input" id="medicine_message"', $arQuestion["HTML_CODE"])?>
                    <div class="input__notification"></div>
                </label>
            </div>
        </div>
        <?
        if($arResult["isUseCaptcha"] == "Y")
        {
        ?>
            <b><?=GetMessage("FORM_CAPTCHA_TABLE_TITLE")?></b>
            <input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" />
            <img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" />
            <?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?>
            <input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" />
        <?
        } // isUseCaptcha
        ?>
        <div class="contact-form__bottom">
            <div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
                ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
                данных&raquo;.
            </div>

            <button class="form-button contact-form__bottom-button" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?>
                type="submit" name="web_form_submit" value="">
                <div class="form-button__title">
                    <?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>
                </div>
            </button>

            <?if ($arResult["F_RIGHT"] >= 15):?>

                <input class="form-button__title" type="hidden" name="web_form_apply" value="Y" />
                <button class="form-button contact-form__bottom-button" type="submit" name="web_form_apply" value="">
                    <div class="form-button__title"><?=GetMessage("FORM_APPLY")?></div>
                </button>
            <?endif;?>

                <button class="form-button contact-form__bottom-button" type="reset" value="">
                    <div class="form-button__title"><?=GetMessage("FORM_RESET");?></div>
                </button>

        </div><p><?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?></p>
    <?=$arResult["FORM_FOOTER"]?>
    </div>
</div>
<?                       
} //endif (isFormNote)   
?>
