<?php

/***********************************************************************************
 * X2CRM is a customer relationship management program developed by
 * X2Engine, Inc. Copyright (C) 2011-2016 X2Engine Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY X2ENGINE, X2ENGINE DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact X2Engine, Inc. P.O. Box 66752, Scotts Valley,
 * California 95067, USA. on our website at www.x2crm.com, or at our
 * email address: contact@x2engine.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * X2Engine" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by X2Engine".
 **********************************************************************************/



/**
 * Behavior for creating a link for charts. 
 * Since charts do not have their own view file, 
 * the link takes the user to the corresponding report page.
 */
class ChartsLinkableBehavior extends LinkableBehavior {

    public $viewRoute = "/reports";

    /**
     * Generates a url to the view of the object.
     * @return string a url to the model
     */
    public function getUrl() {
        if (isset($this->owner->report)) {
            if (Yii::app()->controller instanceof CController) // Use the controller
                return Yii::app()->controller->createAbsoluteUrl($this->viewRoute, array('id' => $this->owner->report->id));
            if (empty($url)) // Construct an absolute URL; no web request data available.
                return Yii::app()->absoluteBaseUrl . '/index.php' . $this->viewRoute . '/' . $this->owner->report->id;
        }else {
            return Yii::app()->controller->createAbsoluteUrl($this->viewRoute.'/index');
        }
    }

}
