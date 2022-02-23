<?php
//  ------------------------------------------------------------------------ //
// $Id: main.php 0003 12:31 2008/04/09 avtx30 $
//  ------------------------------------------------------------------------ //

// mainview
define("_MD_D3DOWNLOADS_TOTAL_NUM","There are %s downloads");
define("_MD_D3DOWNLOADS_CATEGORY_NUM","There are %s downloads");
define("_MD_D3DOWNLOADS_SEL_CATEGORY","Select category");
define("_MD_D3DOWNLOADS_CATEGORY","Category");
define("_MD_D3DOWNLOADS_LATESTLIST","Latest downloads");
define("_MD_D3DOWNLOADS_VERSION","Version");
define("_MD_D3DOWNLOADS_DATE","Date");
define("_MD_D3DOWNLOADS_DESCRIPTION","Description");
define("_MD_D3DOWNLOADS_DOWNSUM","Downloads");
define("_MD_D3DOWNLOADS_HOMEPAGE","Home Page");
define("_MD_D3DOWNLOADS_SIZE","Download Size: ");
define("_MD_D3DOWNLOADS_NUMBYTES","%s bytes");
define("_MD_D3DOWNLOADS_PLATFORM","Platform");
define("_MD_D3DOWNLOADS_RATINGC","Rating: ");
define("_MD_D3DOWNLOADS_VOTEC","Votes");
define("_MD_D3DOWNLOADS_RATE","Rate");
define("_MD_D3DOWNLOADS_MODIFY","Edit");
define("_MD_D3DOWNLOADS_REPORTBROKEN","Report broken download");
define("_MD_D3DOWNLOADS_TELLAFRIEND","Tell a friend");
define("_MD_D3DOWNLOADS_COMMENTS","Comments: ");
define("_MD_D3DOWNLOADS_VOTEAPPRE","Your vote is appreciated.");
define("_MD_D3DOWNLOADS_THANKURATE","Thank you for %s ");
define("_MD_D3DOWNLOADS_VOTEONCE","Please do not vote for the same resource more than once.");
define("_MD_D3DOWNLOADS_RATINGSCALE","The scale is 1 - 10, with 1 being poor and 10 being excellent.");
define("_MD_D3DOWNLOADS_BEOBJECTIVE","Please be objective, if everyone receives a 1 or a 10, the ratings will not be very useful.");
define("_MD_D3DOWNLOADS_DONOTVOTE","Do not vote for your own resource.");
define("_MD_D3DOWNLOADS_NORATING","No rating selected.");
define("_MD_D3DOWNLOADS_CANTVOTEOWN","You cannot vote on the resource you submitted.<br>All votes are logged and reviewed.");
define("_MD_D3DOWNLOADS_VOTEONCE2","Please do not vote for the same resource more than once.");
define("_MD_D3DOWNLOADS_RATEIT","Rate It!");
define("_MD_D3DOWNLOADS_NOMATCH","No matches found to your query");
define("_MD_D3DOWNLOADS_THANKSFORHELP","Thank you for helping to maintain this directory's integrity.");
define("_MD_D3DOWNLOADS_FORSECURITY","For security reasons your user name and IP address will also be temporarily recorded.");
define("_MD_D3DOWNLOADS_THANKSFORINFO","Thank you for the information. We'll look into your request shortly.");
define("_MD_D3DOWNLOADS_THANKSSUBMIT","Thank you for your submission!");
define("_MD_D3DOWNLOADS_THANKSSUBMIT_CHANGED","Thanks for your submission. Your file is saved with '.changed' extension.");
define("_MD_D3DOWNLOADS_ALREADYREPORTED","You have already submitted a broken report for this resource.");
define("_MD_D3DOWNLOADS_LABEL_PERPAGE","Downloads per page");
define("_MD_D3DOWNLOADS_MAIN","TOP");
define("_MD_D3DOWNLOADS_SORTBY","Sort by:");
define("_MD_D3DOWNLOADS_TITLE","Title");
define("_MD_D3DOWNLOADS_RATING","Rating");
define("_MD_D3DOWNLOADS_CURSORTBY","Files currently sorted by: %s");
define("_MD_D3DOWNLOADS_POPULARITYLTOM","Popularity (Lowest to Highest Hits)");
define("_MD_D3DOWNLOADS_POPULARITYMTOL","Popularity (Highest to Lowest Hits)");
define("_MD_D3DOWNLOADS_TITLEATOZ","Title (A to Z)");
define("_MD_D3DOWNLOADS_TITLEZTOA","Title (Z to A)");
define("_MD_D3DOWNLOADS_DATEOLD","Date (Older Files Listed First)");
define("_MD_D3DOWNLOADS_DATENEW","Date (Newest Files Listed First)");
define("_MD_D3DOWNLOADS_RATINGLTOH","Rating (Lowest Score to Highest Score)");
define("_MD_D3DOWNLOADS_RATINGHTOL","Rating (Highest Score to Lowest Score)");
define("_MD_D3DOWNLOADS_SHOWDETAIL","Show detail");
define("_MD_D3DOWNLOADS_SHOWSINGLEFILE","Read more");
define("_MD_D3DOWNLOADS_NEWTHISWEEK","New this week");
define("_MD_D3DOWNLOADS_UPTHISWEEK","Updated this week");
define("_MD_D3DOWNLOADS_POPULAR","Popular");
define("_MD_D3DOWNLOADS_INTARTFOUND","Found an interesting download at %s");
define("_MD_D3DOWNLOADS_INTARTICLE","Found an interesting download information at %s");
define("_MD_D3DOWNLOADS_ADMIN_NEWCATEGORY","New Category");

// SUBMIT
define("_MD_D3DOWNLOADS_NEWSUBMIT","New Download");
define("_MD_D3DOWNLOADS_SUBMIT","Submit");
define("_MD_D3DOWNLOADS_REDIRECT_NEWSUBMIT","Switch to submit form");
define("_MD_D3DOWNLOADS_NOREADPERM","Category not found");
define("_MD_D3DOWNLOADS_NOREADLINKPERM","Download not found");
define("_MD_D3DOWNLOADS_NOSUBMITPERM","You are not allowed to submit to this category");
define("_MD_D3DOWNLOADS_NOEDITTPERM","You are not allowed to edit downloads");
define("_MD_D3DOWNLOADS_NODELEPERM","You are not allowed to delete downloads");
define("_MD_D3DOWNLOADS_NO_CID","Please add downloads at a category's page.");
define("_MD_D3DOWNLOADS_SUBMIT_NEW","Submit new download");
define("_MD_D3DOWNLOADS_SUBMIT_EDIT","Edit download");
define("_MD_D3DOWNLOADS_SUBMIT_TITLE","Title");
define("_MD_D3DOWNLOADS_SUBMIT_POSTNAME","Poster");
define("_MD_D3DOWNLOADS_SUBMIT_URL","Download URL");
define("_MD_D3DOWNLOADS_SUBMIT_UPLOAD","Upload file");
define("_MD_D3DOWNLOADS_LABEL_INPUT_URL","Switch to upload form");
define("_MD_D3DOWNLOADS_SUBMIT_FILENAME","File Name No.1");
define("_MD_D3DOWNLOADS_SUBMIT_CATEGORY","Category");
define("_MD_D3DOWNLOADS_SUBMIT_HOMEPAGE","Home Page URL");
define("_MD_D3DOWNLOADS_SUBMIT_VERSION","Version");
define("_MD_D3DOWNLOADS_SUBMIT_SIZE","File Size");
define("_MD_D3DOWNLOADS_SUBMIT_MAXFILESIZE","Max file size : %s byte");
define("_MD_D3DOWNLOADS_SUBMIT_SIZE_DESC","Note: File size will be automatically calculated if you use upload function.");
define("_MD_D3DOWNLOADS_SUBMIT_BYTE","byte");
define("_MD_D3DOWNLOADS_SUBMIT_PLATFORM","Platform");
define("_MD_D3DOWNLOADS_SUBMIT_DESCRIPTION","Description");
define("_MD_D3DOWNLOADS_SUBMIT_DESCRIPTION_DESC","Use <span style='font-weight: bold;'>[pagebreak]</span> tag to add a page break.<br>and <span style='font-weight: bold;'>[title]</span>,<span style='font-weight: bold;'>[filename]</span>,<span style='font-weight: bold;'>[filename2]</span>,<span style='font-weight: bold;'>[expired]</span> available.");
define("_MD_D3DOWNLOADS_SUBMIT_LOGOURL","Screenshot image");
define("_MD_D3DOWNLOADS_SUBMIT_LOGOURL_DESC","Use images under %s directory for screenshot e.g. shot.gif<br>Leave it blank if there is no image.");
define("_MD_D3DOWNLOADS_SUBMIT_HTML","Enable HTML");
define("_MD_D3DOWNLOADS_SUBMIT_SMILEY","Enable smileys");
define("_MD_D3DOWNLOADS_SUBMIT_BR","Enable auto new line");
define("_MD_D3DOWNLOADS_SUBMIT_XCODE","Allow BBCode");
define("_MD_D3DOWNLOADS_BTN_SUBMITEDITING","Submit");
define("_MD_D3DOWNLOADS_BTN_CANSEL","Cancel");
define("_MD_D3DOWNLOADS_MSG_CONFIRMDELETECONTENT","Are you sure you want to delete?");
define("_MD_D3DOWNLOADS_NO_DATA","No data to save");
define("_MD_D3DOWNLOADS_TITLE_OK","Thank you for the title");
define("_MD_D3DOWNLOADS_TITLE_NONE","Title need to be input");
define("_MD_D3DOWNLOADS_TITLE_TOOLONG","Please enter Title in one-byte characters with length up to %s");  
define("_MD_D3DOWNLOADS_URL_OK","Thank you for the download URL");
define("_MD_D3DOWNLOADS_URL_CHECK","Download URL is not valid");
define("_MD_D3DOWNLOADS_URL_NONE","Download URL need to be input");
define("_MD_D3DOWNLOADS_URL_TOOLONG","Please enter Download URL in one-byte characters with length up to %s");  
define("_MD_D3DOWNLOADS_DESCRIPTION_OK","Thank you for your description");
define("_MD_D3DOWNLOADS_DESCRIPTION_NONE","You need to enter a description");
define("_MD_D3DOWNLOADS_HOMEPAGE_OK","Thank you for the home page URL");
define("_MD_D3DOWNLOADS_HOMEPAGE_CHECK","The URL of home page is not valid");
define("_MD_D3DOWNLOADS_SIZE_OK","Thank you for size info");
define("_MD_D3DOWNLOADS_SIZE_CHECK","The size info is not valid");
define("_MD_D3DOWNLOADS_SIZE_TOOLONG","Please enter the size in one-byte characters with length up to %s");  
define("_MD_D3DOWNLOADS_URL_ONCE","Could not register that file/script because it has already been registered.");
define("_MD_D3DOWNLOADS_VERSION_OK","Thank you for Version info");
define("_MD_D3DOWNLOADS_VERSION_TOOLONG","Please enter Version in one-byte characters with length up to %s");
define("_MD_D3DOWNLOADS_PLATFORM_OK","Thank you for the Platform info");
define("_MD_D3DOWNLOADS_PLATFORM_TOOLONG","Please enter Platform in one-byte characters with length up to %s");
define("_MD_D3DOWNLOADS_UNAPPROVAL_ONCE","Could not save this download URL because it has already been added to the waiting list");
define("_MD_D3DOWNLOADS_REGSTERED","Registered");
define("_MD_D3DOWNLOADS_DELETED","Deleted");
define("_MD_D3DOWNLOADS_NONDELETED","No data to delete");
define("_MD_D3DOWNLOADS_SUBJECT","Subject");
define("_MD_D3DOWNLOADS_URL","Download URL: ");
define("_MD_D3DOWNLOADS_BODY","Description");
define("_MD_D3DOWNLOADS_SUBMIT_ACCESS_URL","Visit");
define("_MD_D3DOWNLOADS_SUBMIT_OPTION","Options");
define("_MD_D3DOWNLOADS_SUBMIT_VISIBLE","Visible");
define("_MD_D3DOWNLOADS_SUBMIT_COMMENT","Allow comment");
define("_MD_D3DOWNLOADS_SUBMIT_DATEOPTION","Change date");
define("_MD_D3DOWNLOADS_SUBMIT_NOTIFY","Notify when approved");
define("_MD_D3DOWNLOADS_DONTABUSE","Username and IP are recorded, so please don't abuse the system.");
define("_MD_D3DOWNLOADS_SUBMITONCE","Submit your file/script only once.");
define("_MD_D3DOWNLOADS_ALLPENDING","All file/script information are posted pending verification.");
define("_MD_D3DOWNLOADS_TAKEDAYS","It may take several days for your file/script to be added to our database.");
define("_MD_D3DOWNLOADS_TOTAL_BROKEN","Broken reports (%s )");
define("_MD_D3DOWNLOADS_BROKENDEL","Ignore the report");
define("_MD_D3DOWNLOADS_SENDERNAME","Sender");
define("_MD_D3DOWNLOADS_NOBROKEN","There are no broken reports");
define("_MD_D3DOWNLOADS_BROKENDELETED","Broken file report deleted.");
define("_MD_D3DOWNLOADS_TOTAL_VOTE","Total votes (%s )");
define("_MD_D3DOWNLOADS_USER_TOTAL_VOTE","Votes by registered users (votes: %s )");
define("_MD_D3DOWNLOADS_USER","User");
define("_MD_D3DOWNLOADS_IP","IP Address");
define("_MD_D3DOWNLOADS_MD_USERAVG","User Average Rate");
define("_MD_D3DOWNLOADS_MD_TOTALRATE","Total Rate");
define("_MD_D3DOWNLOADS_VOTE_DATE","Date");
define("_MD_D3DOWNLOADS_NOREGVOTES","No Registered User Votes");
define("_MD_D3DOWNLOADS_GUEST_TOTAL_VOTE","Votes by guests (Votes: %s )");
define("_MD_D3DOWNLOADS_NOGUESTVOTES","There are no votes from guests");
define("_MD_D3DOWNLOADS_CONFIRM_FILE_COPY","Are you sure you want to copy?");
define("_MD_D3DOWNLOADS_SUBMIT_COPY","Copy to other d3downloads instances");
define("_MD_D3DOWNLOADS_BTN_COPY","Copy");
define("_MD_D3DOWNLOADS_FILELARGE","Cannot saved because file is bigger than the allowed size");
define("_MD_D3DOWNLOADS_UPLOADDIR_NOT_IS_DIR","Create upload directory and set write permission to it");
define("_MD_D3DOWNLOADS_UPLOADDIR_NOT_MKDIR","Cannot make upload directory. Please check parent directory's write permission");
define("_MD_D3DOWNLOADS_UPLOADDIR_NOT_IS_WRITEABLE","Cannot write to upload directory. Please check directory's write permission");
define("_MD_D3DOWNLOADS_UPLOADERROR_EXT","Upload failed. File with extension %s cannot be uploaded");
define("_MD_D3DOWNLOADS_UPLOADERROR","Upload failed. Check file size, file extention etc.");
define("_MD_D3DOWNLOADS_EXT_CHECK","Cannot upload files with this extension");
define("_MD_D3DOWNLOADS_UPLOAD_ERR_INI_SIZE","File size is bigger than that set in php.ini");  

// D3DOWNLOADS HISTORY
define("_MD_D3DOWNLOADS_HISTORY","Download History");
define("_MD_D3DOWNLOADS_HISTORYLIST","Other History");
define("_MD_D3DOWNLOADS_NOWDATALIST","Current content");
define("_MD_D3DOWNLOADS_VIEWHISTORY","Browse");

// TOP TEN
define("_MD_D3DOWNLOADS_TOP_TEN_TITLE_HITS","Popular downloads");
define("_MD_D3DOWNLOADS_TOP_TEN_TITLE_RATING","Top rated");
define("_MD_D3DOWNLOADS_TOP_TEN_TITLE","Title");
define("_MD_D3DOWNLOADS_TOP_TEN_RANK","Top downloads");
define("_MD_D3DOWNLOADS_TOP_TEN_CATEGORY","Category");
define("_MD_D3DOWNLOADS_TOP_TEN_HITS","downloads");
define("_MD_D3DOWNLOADS_TOP_TEN_RATING","Rating");
define("_MD_D3DOWNLOADS_TOP_TEN_VOTE","votes");
define("_MD_D3DOWNLOADS_TOP_TEN_TOP10","%s Top 10");

// ERROR MESSEAGE
define("_MD_D3DOWNLOADS_ERROR_MESSEAGE","There is an error ID: %s");
define("_MD_D3DOWNLOADS_ERROR_MESSEAGE_NOID","There is an error");

// add photosite
define("_MD_D3DOWNLOADS_NOPERMISETOLINK", "This file doesn't belong to the site you came from <br>Please e-mail the webmaster of the site you came from and tell him:   <br /><b>NOT TO LEECH OTHER SITES LINKS!!</b> <br /><b>Definition of a Leecher:</b> One who is to lazy to link from his own server or steals other peoples hard work and makes it look like his own <br />  Your IP address <b>has been logged</b>.");
define('_MD_D3DOWNLOADS_BCAT_TOTAL','Total:');
define('_MD_D3DOWNLOADS_CAT_EDIT','Edit Category');
define("_MD_D3DOWNLOADS_HOMEPAGE_TOOLONG","Please enter URL of home page in one-byte characters with length up to %s");
define('_MD_D3DOWNLOADS_FILENAME_TOOLONG',"Please enter File name in one-byte characters with length up to %s");
define('_MD_D3DOWNLOADS_CHECK_ENCODING','Processing was interrupted because there was multi byte illegal character string.');
define('_MD_D3DOWNLOADS_CHARSET','Sample of Encode');
define('_MD_D3DOWNLOADS_SUBMIT_EXTENSION','Can upload files with extensions. : %s');
define('_MD_D3DOWNLOADS_CREATED','Posted date');
define('_MD_D3DOWNLOADS_LABEL_SPECIFY_DATETIME','Specify datetime');
define('_MD_D3DOWNLOADS_EXPIRED','Expired');
define('_MD_D3DOWNLOADS_FILELIST_MAIN','File List');
define('_MD_D3DOWNLOADS_FILELIST','List');
define('_MD_D3DOWNLOADS_ID','ID');
define('_MD_D3DOWNLOADS_SUMMARY','Summary');
define('_MD_D3DOWNLOADS_INVISIBLE_NUM','[Private %s items]');
define('_MD_D3DOWNLOADS_VISIBLE','Visible');
define('_MD_D3DOWNLOADS_SUBMIT_HOMEPAGETITLE','Home Page Title');
define('_MD_D3DOWNLOADS_HOMEPAGETITLE_OK','Thank you for the home page Title');
define('_MD_D3DOWNLOADS_HOMEPAGETITLE_TOOLONG','Please enter home page Title in one-byte characters with length up to %s');
define('_MD_D3DOWNLOADS_LICENSE','License');
define('_MD_D3DOWNLOADS_SUBMIT_LICENSE','License');
define('_MD_D3DOWNLOADS_LICENSE_OK','Thank you for the license');
define('_MD_D3DOWNLOADS_LICENSE_TOOLONG','Please enter License in one-byte characters with length up to %s');
define('_MD_D3DOWNLOADS_CAN_READ','Read');
define('_MD_D3DOWNLOADS_CANNOT_READ','Cannot Read');
define('_MD_D3DOWNLOADS_BROKEN_NUM','[File broken %s items]');
define('_MD_D3DOWNLOADS_BROKENCHECK','Broken Check of Upload  Files');
define('_MD_D3DOWNLOADS_LABEL_BROKENCHECKDONE','Broken Check of Upload  Files Done');
define('_MD_D3DOWNLOADS_CONFIRM_BROKENCHECK','Are you sure you want to broken check of upload  files? Being able to check is only files uploaded by this module. ');
define('_MD_D3DOWNLOADS_NO_CATEGORY','Because there are no categories, new registrations can not be');
define('_MD_D3DOWNLOADS_UNAPPROVAL_NUM','[Waiting %s items]');
define('_MD_D3DOWNLOADS_SUBMIT_FILTERS','Filters');
define("_MD_D3DOWNLOADS_SUBMIT_FILENAME2","File Name No.2");
define('_MD_D3DOWNLOADS_SUBMIT_FILE1','File No.1 : ');
define('_MD_D3DOWNLOADS_SUBMIT_FILE2','File No.2 : ');
define('_MD_D3DOWNLOADS_SUBMIT_DOWNLOAD','Download');
define('_MD_D3DOWNLOADS_FILE','file');
define('_MD_D3DOWNLOADS_FILE_CHECK','File %s is not found or broken.');
define('_MD_D3DOWNLOADS_SUBMIT_UID','(User ID)');
define('_MD_D3DOWNLOADS_MODFILE_ONCE','This request is currently not possible. The file/script is pending revision.');
define('_MD_D3DOWNLOADS_RESTOREDONE','Restore data completed.');
define('_MD_D3DOWNLOADS_CAT_VISIBLE','View Category');
define('_MD_D3DOWNLOADS_USERACCESS_EDIT','Category Permissions');
define('_MD_D3DOWNLOADS_MAINCAT_USERACCESS_EDIT','Parent Permissions');
define('_MD_D3DOWNLOADS_CAN_READ_INFO','Read');
define('_MD_D3DOWNLOADS_CAN_POST_INFO','Post');
define('_MD_D3DOWNLOADS_CAN_EDIT_INFO','Edit');
define('_MD_D3DOWNLOADS_CAN_DELETE_INFO','Delete');
define('_MD_D3DOWNLOADS_POST_AUTO_APPROVED_INFO','Auto-appove(Submit)');
define('_MD_D3DOWNLOADS_EDIT_AUTO_APPROVED_INFO','Auto-appove(Edit)');
define('_MD_D3DOWNLOADS_CAN_HTML_INFO','HTML');
define('_MD_D3DOWNLOADS_CAN_UPLOAD_INFO','UPLOAD');
define('_MD_D3DOWNLOADS_PERMISSION','Allow');
define('_MD_D3DOWNLOADS_LABEL_READ_INFO','Category Permissions');
define('_MD_D3DOWNLOADS_GROUPNAME','Group Name');
define('_MD_D3DOWNLOADS_UID','User ID');
define('_MD_D3DOWNLOADS_UNAME','User Name');
define('_MD_D3DOWNLOADS_SUBMIT_URL_DESC','When you enter : XOOPS_TRUST_PATH, XOOPS_ROOT_PATH or XOOPS_URL , the conversion is automatically processed.');
define('_MD_D3DOWNLOADS_MYPOST_TITLE','Entries for %s');
define('_MD_D3DOWNLOADS_MYPOST_NUM','Entries for %s %s items');
define('_MD_D3DOWNLOADS_MYPOST_MORE','More Posts from %s');
define('_MD_D3DOWNLOADS_CONFIRM_COPY','Are you sure you want to copy? Downloaded files will be copied where possible, depending on the environment. Please check carefully after copying.');
define('_MD_D3DOWNLOADS_COPYED','Copy Done');
define('_MD_D3DOWNLOADS_NO_COPY','Select destination category');
define('_MD_D3DOWNLOADS_MYLINKLTOH','My link (Lowest to Highest Hits)');
define('_MD_D3DOWNLOADS_MYLINKHTOL','My link(Highest to Lowest Hits)');
define('_MD_D3DOWNLOADS_SEL_INTREE','Show sub-categories');
define('_MD_D3DOWNLOADS_NO_INTREE','Hide sub-categories');
define('_MD_D3DOWNLOADS_ADD_MYLINK','Add My Link');
define('_MD_D3DOWNLOADS_DEL_MYLINK','Remove from My Link');
define('_MD_D3DOWNLOADS_ADD_MYLINK_DONE','It has been added to My Link.');
define('_MD_D3DOWNLOADS_DEL_MYLINK_DONE','It has been deleted from My Link.');
define('_MD_D3DOWNLOADS_DELALL_MYLINK','Remove all from My Link');
define('_MD_D3DOWNLOADS_MYLINK_TITLE','My Link for %s');
define('_MD_D3DOWNLOADS_TOTAL_MYLINK','There are %s My Link');
define('_MD_D3DOWNLOADS_CATEGORY_MYLINK','There are %s My Link');
define('_MD_D3DOWNLOADS_MYLINK_INFO','My Link feature "What\'s New" provides a quick way to read the latest updates from RSS reader, etc.');
define('_MD_D3DOWNLOADS_BROKEN_FILE','broken file !!');
define('_MD_D3DOWNLOADS_SUBMIT_DELIMITER','Delimiter');
define('_MD_D3DOWNLOADS_SUBMIT_SPASE','Space');
define('_MD_D3DOWNLOADS_SUBMIT_DESCRIPTION_IMAGE','Inserting the picture in Description');
define('_MD_D3DOWNLOADS_LEFT','left');
define('_MD_D3DOWNLOADS_CENTER','center');
define('_MD_D3DOWNLOADS_RIGHT','right');
define('_MD_D3DOWNLOADS_SUBMIT_EXTRA','Add more Information');
define('_MD_D3DOWNLOADS_SUBMIT_EXTRA_DESC','Input like this <span style="font-weight: bold;">&lt;&lt;title&gt;&gt;Description</span><br />When it inputs in the text box which is under, automatically it becomes specified type.<br />In Description <span style="font-weight: bold;">BBCode</span>,<span style="font-weight: bold;">[title]</span>,<span style="font-weight: bold;">[filename]</span>,<span style="font-weight: bold;">[filename2]</span>,<span style="font-weight: bold;">[expired]</span>,<span style="font-weight: bold;">[pagebreak]</span> available.');
define("_MD_D3DOWNLOADS_SUBMIT_EXTRA_SAMPLE","Example<br />&lt;&lt;Expired&gt;&gt;[expired]<br />&lt;&lt;Price&gt;&gt;$50<br /><br />Note: [expired]'s automatically transformation");
define('_MD_D3DOWNLOADS_SUBMIT_INSERT','Add');
define('_MD_D3DOWNLOADS_EXTRA_TITLE','Title:');
define('_MD_D3DOWNLOADS_EXTRA_DESC','Description:');
define('_MD_D3DOWNLOADS_SUBMIT_TITLE_INSERT','Title');
define('_MD_D3DOWNLOADS_SUBMIT_FILENAME_INSERT','File Name No.1');
define('_MD_D3DOWNLOADS_SUBMIT_FILENAME2_INSERT','File Name No.2');
define('_MD_D3DOWNLOADS_SUBMIT_EXPIRED_INSERT','Expired');
define('_MD_D3DOWNLOADS_SUBMIT_PAGEBREAK_INSERT','[pagebreak]');
define('_MD_D3DOWNLOADS_BROKEN_MESSAGE','[Message](Please enter, if there is necessity.)');
define('_MD_D3DOWNLOADS_BROKEN_NAME','[Your name](Arbitrary)');
define('_MD_D3DOWNLOADS_BROKEN_EMAIL','[Mail address](Arbitrary)');
define('_MD_D3DOWNLOADS_MESSAGE_THANKS','Thank you for the message');
define('_MD_D3DOWNLOADS_NAME_THANKS','Thank you for the name');
define('_MD_D3DOWNLOADS_NAME_TOOLONG','Please enter Your name in one-byte characters with length up to %s');
define('_MD_D3DOWNLOADS_EMAIL_THANKS','Thank you for the mail address');
define('_MD_D3DOWNLOADS_EMAIL_CHECK','Mail address is not valid');
define('_MD_D3DOWNLOADS_EMAIL_TOOLONG','Please enter Mail address in one-byte characters with length up to %s');
define('_MD_D3DOWNLOADS_MD5','[ File Name ] %s  [ MD5 checksum ] %s');
define('_MD_D3DOWNLOADS_CHECK_SPAM','Although it feels sorry causing trouble, please give me contribution again after setting JavaScript as "effective."');
