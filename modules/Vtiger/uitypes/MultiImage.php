<?php
/**
 * UIType MultiImage Field Class.
 *
 * @copyright YetiForce Sp. z o.o
 * @license   YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author    Michał Lorencik <m.lorencik@yetiforce.com>
 * @author    Radosław Skrzypczak <r.skrzypczak@yetiforce.com>
 */

/**
 * UIType MultiImage Field Class.
 */
class Vtiger_MultiImage_UIType extends Vtiger_Base_UIType
{
	/**
	 * {@inheritdoc}
	 */
	public function setValueFromRequest(\App\Request $request, Vtiger_Record_Model $recordModel, $requestFieldName = false)
	{
		$fieldName = $this->getFieldModel()->getFieldName();
		if (!$requestFieldName) {
			$requestFieldName = $fieldName;
		}
		$value = \App\Fields\File::updateUploadFiles($request->getArray($requestFieldName, 'Text'), $recordModel, $this->getFieldModel());
		$this->validate($value, true);
		$recordModel->set($fieldName, $this->getDBValue($value, $recordModel));
	}

	/**
	 * {@inheritdoc}
	 */
	public function validate($value, $isUserFormat = false)
	{
		if ($this->validate || empty($value)) {
			return;
		}
		if (!$isUserFormat) {
			$value = \App\Json::decode($value);
		}
		foreach ($value as $item) {
			if (empty($item['key']) || empty($item['name']) || empty($item['size']) || App\TextParser::getTextLength($item['key']) !== 50) {
				throw new \App\Exceptions\Security('ERR_ILLEGAL_FIELD_VALUE||' . $this->getFieldModel()->getFieldName() . '||' . \App\Json::encode($value), 406);
			}
		}
		$params = $this->getFieldModel()->getFieldParams();

		$this->validate = true;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getDBValue($value, $recordModel = false)
	{
		return \App\Json::encode($value);
	}

	/**
	 * Get display value as string in JSON format.
	 *
	 * @param {string}                 $value
	 * @param bool|int                 $record
	 * @param bool|Vtiger_Record_Model $recordModel
	 * @param bool                     $rawText
	 * @param bool|int                 $length
	 *
	 * @return string
	 */
	public function getDisplayValueJson($value, $record = false, $recordModel = false, $rawText = false, $length = false)
	{
		$value = \App\Json::decode($value);
		$len = $length ? $length : count($value);
		if ($rawText) {
			$result = '';
			if (!is_array($value)) {
				return '';
			}
			for ($i = 0; $i < $len; $i++) {
				$val = $value[$i];
				$result .= $val['name'] . ', ';
			}
			return \App\Purifier::encodeHtml(trim($result, "\n\s\t ,"));
		}
		if (!is_array($value)) {
			return '[]';
		}
		for ($i = 0; $i < $len; $i++) {
			$value[$i]['imageSrc'] = "file.php?module={$this->getFieldModel()->getModuleName()}&action=MultiImage&field={$this->getFieldModel()->getFieldName()}&record={$recordModel->getId()}&key={$value[$i]['key']}";
			unset($value[$i]['path']);
		}
		return \App\Purifier::encodeHtml(\App\Json::encode($value));
	}

	/**
	 * {@inheritdoc}
	 */
	public function getDisplayValue($value, $record = false, $recordModel = false, $rawText = false, $length = false)
	{
		$value = $this->getDisplayValueJson($value, $record, $recordModel, $rawText, $length);
		$moduleName = $this->getFieldModel()->getModuleName();
		$viewer = \Vtiger_Viewer::getInstance();
		$viewer->assign('FIELD_VALUE', $value);
		$viewer->assign('FIELD_INFO', \App\Json::encode($this->getFieldModel()->getFieldInfo()));
		$viewer->assign('FIELD_NAME', $this->getFieldModel()->getName());
		$viewer->assign('MODULE_NAME', $moduleName);
		return $viewer->view('uitypes/MultiImageDetailView.tpl', $moduleName, true);
	}

	/**
	 * {@inheritdoc}
	 */
	public function getListViewDisplayValue($value, $record = false, $recordModel = false, $rawText = false)
	{
		return $this->getDisplayValue($value, $record, $recordModel, $rawText, $this->getFieldModel()->get('maxlengthtext'));
	}

	/**
	 * {@inheritdoc}
	 */
	public function getEditViewDisplayValue($value, $recordModel = false)
	{
		$value = \App\Json::decode($value);
		if (is_array($value)) {
			foreach ($value as &$item) {
				$item['imageSrc'] = "file.php?module={$this->getFieldModel()->getModuleName()}&action=MultiImage&field={$this->getFieldModel()->getFieldName()}&record={$recordModel->getId()}&key={$item['key']}";
				unset($item['path']);
			}
		} else {
			$value = [];
		}
		return \App\Purifier::encodeHtml(\App\Json::encode($value));
	}

	/**
	 * Function to get the Template name for the current UI Type object.
	 *
	 * @return string - Template Name
	 */
	public function getTemplateName()
	{
		return 'uitypes/MultiImage.tpl';
	}

	/**
	 * If the field is editable by ajax.
	 *
	 * @return bool
	 */
	public function isAjaxEditable()
	{
		return false;
	}

	/**
	 * If the field is active in search.
	 *
	 * @return bool
	 */
	public function isActiveSearchView()
	{
		return false;
	}

	/**
	 * If the field is sortable in ListView.
	 *
	 * @return bool
	 */
	public function isListviewSortable()
	{
		return false;
	}
}
