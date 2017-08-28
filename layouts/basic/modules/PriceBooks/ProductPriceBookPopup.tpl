{*<!--
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
* ("License"); You may not use this file except in compliance with the License
* The Original Code is:  vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
*
********************************************************************************/
-->*}
{strip}
    <div id="popupPageContainer" class="contentsDiv">
        <div class="paddingLeftRight10px">{include file=\App\Layout::getTemplatePath('PopupSearch.tpl', $MODULE_NAME)}
            <form id="popupPage" action="javascript:void(0)">
                <div id="popupContents">{include file=\App\Layout::getTemplatePath('ProductPriceBookPopupContents.tpl', $PARENT_MODULE)}</div>
            </form>
        </div>
        <input type="hidden" class="triggerEventName" value="{$TRIGGER_EVENT_NAME}"/>
    </div>
</div>
{/strip}
