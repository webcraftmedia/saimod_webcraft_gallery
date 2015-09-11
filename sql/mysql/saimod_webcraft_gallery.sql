INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5000, 42, 0, 0, 'saimod_webcraft_gallery', 'action', NULL);

INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5001, 42, 2, 5000, 'showgalleryitem', 'gallery', 'UINT0');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5002, 42, 2, 5000, 'showgalleryitem', 'id', 'UINT0');

INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5005, 42, 2, 5000, 'addgalleryitem', 'gallery', 'UINT0');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5006, 42, 2, 5000, 'addgalleryitem', 'position', 'UINT0');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5007, 42, 2, 5000, 'addgalleryitem', 'heading', 'STRING');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5008, 42, 2, 5000, 'addgalleryitem', 'description', 'STRING');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5009, 42, 2, 5000, 'addgalleryitem', 'file_cat', 'STRING');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5010, 42, 2, 5000, 'addgalleryitem', 'file_id', 'STRING');

INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5015, 42, 2, 5000, 'delgalleryitem', 'id', 'UINT0');

INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5020, 42, 2, 5000, 'select_options_id', 'cat', 'STRING');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5021, 42, 3, 5000, 'select_options_id', 'id', 'STRING');

INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5025, 42, 2, 5000, 'chggalleryitem', 'id', 'UINT0');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5026, 42, 2, 5000, 'chggalleryitem', 'gallery', 'UINT0');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5027, 42, 2, 5000, 'chggalleryitem', 'position', 'UINT0');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5028, 42, 2, 5000, 'chggalleryitem', 'heading', 'STRING');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5029, 42, 2, 5000, 'chggalleryitem', 'description', 'STRING');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5030, 42, 2, 5000, 'chggalleryitem', 'file_cat', 'STRING');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5031, 42, 2, 5000, 'chggalleryitem', 'file_id', 'STRING');

INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5035, 42, 2, 5000, 'tab', 'name', 'UINT0');