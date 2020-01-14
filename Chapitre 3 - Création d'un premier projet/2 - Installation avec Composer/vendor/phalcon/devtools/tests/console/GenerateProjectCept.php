<?php

/**
 * @var Codeception\Scenario $scenario
 */

$I = new ConsoleTester($scenario);
$I->wantToTest('Generating project');

$output=<<<OUT
Success: Project was successfully created.
OUT;

$projectsFolder = 'projects';
chmod(app_path($projectsFolder), 0777);

$I->amInPath(app_path($projectsFolder));

/**
 * Case 1 - default path
 */
$projectName1 = 'project-tests1';
$path1 = $projectsFolder . '/' . $projectName1;

$I->dontSeeFileFound(app_path($path1));
$I->runShellCommand('phalcon project ' . $projectName1);
$I->seeFileFound(app_path($path1));
$I->seeFileFound(app_path($path1 . '/app/config/config.php'));
$I->deleteDir(app_path($path1));

/**
 * Case 2 - custom path
 */
$projectName2 = 'project-tests2';
$projectPath2 = 'project-tests2-custom';
$path2 = $projectsFolder . '/' . $projectPath2;

$I->dontSeeFileFound(app_path($path2));
$I->runShellCommand("phalcon project $projectName2 simple $projectPath2");
$I->seeFileFound(app_path($path2));
$I->seeFileFound(app_path($projectsFolder . '/' . $projectPath2 . '/' . $projectName2 . '/app/config/config.php'));
$I->deleteDir(app_path($path2));

/**
 * Case 3 - ini config file
 */
$projectName3 = 'project-tests3';
$path3 = $projectsFolder . '/' . $projectName3;

$I->dontSeeFileFound(app_path($path3));
$I->runShellCommand('phalcon project ' . $projectName3 . ' --use-config-ini');
$I->seeFileFound(app_path($path3));
$I->seeFileFound(app_path($path3 . '/app/config/config.ini'));
$I->deleteDir(app_path($path3));
