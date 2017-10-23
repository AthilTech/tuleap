<?php
/**
 * Copyright 1999-2000 (c) The SourceForge Crew
 * Copyright Enalean (c) 2015 - 2017. All rights reserved.
 *
 * Tuleap and Enalean names and logos are registrated trademarks owned by
 * Enalean SAS. All other trademarks or names are properties of their respective
 * owners.
 *
 * This file is a part of Tuleap.
 *
 * Tuleap is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Tuleap is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tuleap. If not, see <http://www.gnu.org/licenses/>.
 */

require_once('pre.php');
require_once('www/project/admin/project_admin_utils.php');

use Tuleap\Project\Admin\ProjectDetails\ProjectDetailsController;
use Tuleap\Project\Admin\ProjectDetails\ProjectDetailsDAO;
use Tuleap\Project\Admin\ProjectDetails\ProjectDetailsRouter;
use Tuleap\Project\Admin\ProjectVisibilityPresenterBuilder;
use Tuleap\Project\Admin\ProjectVisibilityUserConfigurationPermissions;
use Tuleap\Project\Admin\ServicesUsingTruncatedMailRetriever;
use Tuleap\Project\DescriptionFieldsFactory;
use Tuleap\Project\DescriptionFieldsDao;

$group_id = $request->get('group_id');

session_require(array('group'=>$group_id,'admin_flags'=>'A'));

$currentproject                    = new project($group_id);
$fields_factory                    = new DescriptionFieldsFactory(new DescriptionFieldsDao());
$project_details_dao               = new ProjectDetailsDAO();
$project_manager                   = ProjectManager::instance();
$event_manager                     = EventManager::instance();
$project_history_dao               = new ProjectHistoryDao();
$project_visibility_configuration  = new ProjectVisibilityUserConfigurationPermissions();
$service_truncated_mails_retriever = new ServicesUsingTruncatedMailRetriever(EventManager::instance());
$ugroup_user_dao                   = new UGroupUserDao();
$ugroup_manager                    = new UGroupManager();

$ugroup_binding = new UGroupBinding(
    $ugroup_user_dao,
    $ugroup_manager
);

$project_visibility_presenter_builder = new ProjectVisibilityPresenterBuilder(
    $project_visibility_configuration,
    $service_truncated_mails_retriever
);

$project_details_controller = new ProjectDetailsController(
    $fields_factory,
    $currentproject,
    $project_details_dao,
    $project_manager,
    $event_manager,
    $project_history_dao,
    $project_visibility_presenter_builder,
    $project_visibility_configuration,
    $service_truncated_mails_retriever,
    $ugroup_binding
);

$project_details_router = new ProjectDetailsRouter(
    $project_details_controller
);

$project_details_router->route($request);

project_admin_footer(array());
