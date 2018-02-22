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
	{assign var="FIELD_INFO" value=\App\Purifier::encodeHtml(\App\Json::encode($FIELD_MODEL->getFieldInfo()))}
	{assign var="SPECIAL_VALIDATOR" value=$FIELD_MODEL->getValidator()}
	{assign var=FIELD_VALUE value=$FIELD_MODEL->getEditViewDisplayValue($FIELD_MODEL->get('fieldvalue'),$RECORD)}
	{assign var="TIME_FORMAT" value=$USER_MODEL->get('hour_format')}
	{assign var=FIELD_NAME value=$FIELD_MODEL->getName()}
	<div class="input-group time">
		{if $FIELD_NAME neq 'due_date'}
			<div class="input-group-prepend">
				<span class="input-group-text"><span class="notEvent HelpInfoPopover" data-placement="top" data-content="{\App\Language::translate('LBL_AUTO_FILL_DESCRIPTION', $MODULE)}">
						<input type="checkbox" class="autofill" />
					</span>
				</span>
			</div>
		{/if}
		<input id="{$MODULE}_editView_fieldName_{$FIELD_MODEL->getName()}" aria-describedby="basic-addon2" type="text" data-format="{$TIME_FORMAT}" class="clockPicker form-control" value="{$FIELD_VALUE}" title="{\App\Language::translate($FIELD_MODEL->getFieldLabel(), $MODULE)}" name="{$FIELD_MODEL->getFieldName()}"
			   data-validation-engine="validate[{if $FIELD_MODEL->isMandatory() eq true} required,{/if}funcCall[Vtiger_Base_Validator_Js.invokeValidation]]"   {if !empty($SPECIAL_VALIDATOR)}data-validator='{\App\Json::encode($SPECIAL_VALIDATOR)}'{/if} data-fieldinfo='{$FIELD_INFO}' {if $FIELD_MODEL->isEditableReadOnly()}readonly="readonly"{/if} />
		<div class="input-group-append">
			<span class="input-group-text cursorPointer" id="basic-addon2">
				<span class="far fa-clock"></span>
			</span>
		</div>
	</div>
{/strip}
