<?php
//Include Common Files @1-C43A8E7E
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "users_list.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Master Page implementation @1-703C09F6
include_once(RelativePath . "/Designs/theme-gc-intranet/MasterPage.php");
//End Master Page implementation

class clsRecordusersSearch { //usersSearch Class @4-C4FF86BD

//Variables @4-9E315808

    // Public variables
    public $ComponentType = "Record";
    public $ComponentName;
    public $Parent;
    public $HTMLFormAction;
    public $PressedButton;
    public $Errors;
    public $ErrorBlock;
    public $FormSubmitted;
    public $FormEnctype;
    public $Visible;
    public $IsEmpty;

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";

    public $InsertAllowed = false;
    public $UpdateAllowed = false;
    public $DeleteAllowed = false;
    public $ReadAllowed   = false;
    public $EditMode      = false;
    public $ds;
    public $DataSource;
    public $ValidatingControls;
    public $Controls;
    public $Attributes;

    // Class variables
//End Variables

//Class_Initialize Event @4-A35A5210
    function clsRecordusersSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record usersSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "usersSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_last_name = new clsControl(ccsTextBox, "s_last_name", $CCSLocales->GetText("last_name"), ccsText, "", CCGetRequestParam("s_last_name", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @4-A1E04F88
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_last_name->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_last_name->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @4-7EDCCF43
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_last_name->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @4-51996F74
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        if(!$this->FormSubmitted) {
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = "Button_DoSearch";
            if($this->Button_DoSearch->Pressed) {
                $this->PressedButton = "Button_DoSearch";
            }
        }
        $Redirect = "users_list.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "users_list.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @4-D023157D
    function Show()
    {
        global $CCSUseAmp;
        $Tpl = CCGetTemplate($this);
        global $FileName;
        global $CCSLocales;
        $Error = "";

        if(!$this->Visible)
            return;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_last_name->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_DoSearch->Show();
        $this->s_last_name->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End usersSearch Class @4-FCB6E20C

class clsGridusers { //users class @30-0CB76799

//Variables @30-3EC979B5

    // Public variables
    public $ComponentType = "Grid";
    public $ComponentName;
    public $Visible;
    public $Errors;
    public $ErrorBlock;
    public $ds;
    public $DataSource;
    public $PageSize;
    public $IsEmpty;
    public $ForceIteration = false;
    public $HasRecord = false;
    public $SorterName = "";
    public $SorterDirection = "";
    public $PageNumber;
    public $RowNumber;
    public $ControlsVisible = array();

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";
    public $Attributes;

    // Grid Controls
    public $StaticControls;
    public $RowControls;
    public $Sorter_user_id;
    public $Sorter_user_login;
    public $Sorter_first_name;
    public $Sorter_last_name;
    public $Sorter_title;
    public $Sorter_group_id;
    public $Sorter_phone_home;
    public $Sorter_phone_work;
    public $Sorter_phone_day;
    public $Sorter_phone_cell;
    public $Sorter_phone_evening;
    public $Sorter_fax;
    public $Sorter_email;
    public $Sorter_card_number;
    public $Sorter_card_expire_date;
    public $Sorter_country_id;
    public $Sorter_state_id;
    public $Sorter_city;
    public $Sorter_zip;
    public $Sorter_address1;
    public $Sorter_address2;
    public $Sorter_address3;
    public $Sorter_date_add;
    public $Sorter_date_last_login;
    public $Sorter_ip_add;
    public $Sorter_ip_update;
    public $Sorter_language_id;
    public $Sorter_image_url;
    public $Sorter_age_id;
    public $Sorter_gender_id;
    public $Sorter_education_id;
    public $Sorter_income_id;
    public $Sorter_user_SSN;
    public $Sorter_user_is_active;
//End Variables

//Class_Initialize Event @30-CA4E8295
    function clsGridusers($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "users";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid users";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsusersDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 20;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("usersOrder", "");
        $this->SorterDirection = CCGetParam("usersDir", "");

        $this->user_id = new clsControl(ccsLink, "user_id", "user_id", ccsInteger, "", CCGetRequestParam("user_id", ccsGet, NULL), $this);
        $this->user_id->Page = "users_maint.php";
        $this->user_login = new clsControl(ccsLabel, "user_login", "user_login", ccsText, "", CCGetRequestParam("user_login", ccsGet, NULL), $this);
        $this->first_name = new clsControl(ccsLabel, "first_name", "first_name", ccsText, "", CCGetRequestParam("first_name", ccsGet, NULL), $this);
        $this->last_name = new clsControl(ccsLabel, "last_name", "last_name", ccsText, "", CCGetRequestParam("last_name", ccsGet, NULL), $this);
        $this->title = new clsControl(ccsLabel, "title", "title", ccsText, "", CCGetRequestParam("title", ccsGet, NULL), $this);
        $this->group_id = new clsControl(ccsLabel, "group_id", "group_id", ccsInteger, "", CCGetRequestParam("group_id", ccsGet, NULL), $this);
        $this->phone_home = new clsControl(ccsLabel, "phone_home", "phone_home", ccsText, "", CCGetRequestParam("phone_home", ccsGet, NULL), $this);
        $this->phone_work = new clsControl(ccsLabel, "phone_work", "phone_work", ccsText, "", CCGetRequestParam("phone_work", ccsGet, NULL), $this);
        $this->phone_day = new clsControl(ccsLabel, "phone_day", "phone_day", ccsText, "", CCGetRequestParam("phone_day", ccsGet, NULL), $this);
        $this->phone_cell = new clsControl(ccsLabel, "phone_cell", "phone_cell", ccsText, "", CCGetRequestParam("phone_cell", ccsGet, NULL), $this);
        $this->phone_evening = new clsControl(ccsLabel, "phone_evening", "phone_evening", ccsText, "", CCGetRequestParam("phone_evening", ccsGet, NULL), $this);
        $this->fax = new clsControl(ccsLabel, "fax", "fax", ccsText, "", CCGetRequestParam("fax", ccsGet, NULL), $this);
        $this->email = new clsControl(ccsLabel, "email", "email", ccsText, "", CCGetRequestParam("email", ccsGet, NULL), $this);
        $this->card_number = new clsControl(ccsLabel, "card_number", "card_number", ccsText, "", CCGetRequestParam("card_number", ccsGet, NULL), $this);
        $this->card_expire_date = new clsControl(ccsLabel, "card_expire_date", "card_expire_date", ccsText, "", CCGetRequestParam("card_expire_date", ccsGet, NULL), $this);
        $this->country_id = new clsControl(ccsLabel, "country_id", "country_id", ccsInteger, "", CCGetRequestParam("country_id", ccsGet, NULL), $this);
        $this->state_id = new clsControl(ccsLabel, "state_id", "state_id", ccsInteger, "", CCGetRequestParam("state_id", ccsGet, NULL), $this);
        $this->city = new clsControl(ccsLabel, "city", "city", ccsText, "", CCGetRequestParam("city", ccsGet, NULL), $this);
        $this->zip = new clsControl(ccsLabel, "zip", "zip", ccsText, "", CCGetRequestParam("zip", ccsGet, NULL), $this);
        $this->address1 = new clsControl(ccsLabel, "address1", "address1", ccsText, "", CCGetRequestParam("address1", ccsGet, NULL), $this);
        $this->address2 = new clsControl(ccsLabel, "address2", "address2", ccsText, "", CCGetRequestParam("address2", ccsGet, NULL), $this);
        $this->address3 = new clsControl(ccsLabel, "address3", "address3", ccsText, "", CCGetRequestParam("address3", ccsGet, NULL), $this);
        $this->date_add = new clsControl(ccsLabel, "date_add", "date_add", ccsDate, $DefaultDateFormat, CCGetRequestParam("date_add", ccsGet, NULL), $this);
        $this->date_last_login = new clsControl(ccsLabel, "date_last_login", "date_last_login", ccsDate, $DefaultDateFormat, CCGetRequestParam("date_last_login", ccsGet, NULL), $this);
        $this->ip_add = new clsControl(ccsLabel, "ip_add", "ip_add", ccsText, "", CCGetRequestParam("ip_add", ccsGet, NULL), $this);
        $this->ip_update = new clsControl(ccsLabel, "ip_update", "ip_update", ccsText, "", CCGetRequestParam("ip_update", ccsGet, NULL), $this);
        $this->language_id = new clsControl(ccsLabel, "language_id", "language_id", ccsInteger, "", CCGetRequestParam("language_id", ccsGet, NULL), $this);
        $this->image_url = new clsControl(ccsLabel, "image_url", "image_url", ccsText, "", CCGetRequestParam("image_url", ccsGet, NULL), $this);
        $this->age_id = new clsControl(ccsLabel, "age_id", "age_id", ccsInteger, "", CCGetRequestParam("age_id", ccsGet, NULL), $this);
        $this->gender_id = new clsControl(ccsLabel, "gender_id", "gender_id", ccsInteger, "", CCGetRequestParam("gender_id", ccsGet, NULL), $this);
        $this->education_id = new clsControl(ccsLabel, "education_id", "education_id", ccsInteger, "", CCGetRequestParam("education_id", ccsGet, NULL), $this);
        $this->income_id = new clsControl(ccsLabel, "income_id", "income_id", ccsInteger, "", CCGetRequestParam("income_id", ccsGet, NULL), $this);
        $this->user_SSN = new clsControl(ccsLabel, "user_SSN", "user_SSN", ccsText, "", CCGetRequestParam("user_SSN", ccsGet, NULL), $this);
        $this->user_is_active = new clsControl(ccsLabel, "user_is_active", "user_is_active", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("user_is_active", ccsGet, NULL), $this);
        $this->users_Insert = new clsControl(ccsLink, "users_Insert", "users_Insert", ccsText, "", CCGetRequestParam("users_Insert", ccsGet, NULL), $this);
        $this->users_Insert->Parameters = CCGetQueryString("QueryString", array("user_id", "ccsForm"));
        $this->users_Insert->Page = "users_maint.php";
        $this->Sorter_user_id = new clsSorter($this->ComponentName, "Sorter_user_id", $FileName, $this);
        $this->Sorter_user_login = new clsSorter($this->ComponentName, "Sorter_user_login", $FileName, $this);
        $this->Sorter_first_name = new clsSorter($this->ComponentName, "Sorter_first_name", $FileName, $this);
        $this->Sorter_last_name = new clsSorter($this->ComponentName, "Sorter_last_name", $FileName, $this);
        $this->Sorter_title = new clsSorter($this->ComponentName, "Sorter_title", $FileName, $this);
        $this->Sorter_group_id = new clsSorter($this->ComponentName, "Sorter_group_id", $FileName, $this);
        $this->Sorter_phone_home = new clsSorter($this->ComponentName, "Sorter_phone_home", $FileName, $this);
        $this->Sorter_phone_work = new clsSorter($this->ComponentName, "Sorter_phone_work", $FileName, $this);
        $this->Sorter_phone_day = new clsSorter($this->ComponentName, "Sorter_phone_day", $FileName, $this);
        $this->Sorter_phone_cell = new clsSorter($this->ComponentName, "Sorter_phone_cell", $FileName, $this);
        $this->Sorter_phone_evening = new clsSorter($this->ComponentName, "Sorter_phone_evening", $FileName, $this);
        $this->Sorter_fax = new clsSorter($this->ComponentName, "Sorter_fax", $FileName, $this);
        $this->Sorter_email = new clsSorter($this->ComponentName, "Sorter_email", $FileName, $this);
        $this->Sorter_card_number = new clsSorter($this->ComponentName, "Sorter_card_number", $FileName, $this);
        $this->Sorter_card_expire_date = new clsSorter($this->ComponentName, "Sorter_card_expire_date", $FileName, $this);
        $this->Sorter_country_id = new clsSorter($this->ComponentName, "Sorter_country_id", $FileName, $this);
        $this->Sorter_state_id = new clsSorter($this->ComponentName, "Sorter_state_id", $FileName, $this);
        $this->Sorter_city = new clsSorter($this->ComponentName, "Sorter_city", $FileName, $this);
        $this->Sorter_zip = new clsSorter($this->ComponentName, "Sorter_zip", $FileName, $this);
        $this->Sorter_address1 = new clsSorter($this->ComponentName, "Sorter_address1", $FileName, $this);
        $this->Sorter_address2 = new clsSorter($this->ComponentName, "Sorter_address2", $FileName, $this);
        $this->Sorter_address3 = new clsSorter($this->ComponentName, "Sorter_address3", $FileName, $this);
        $this->Sorter_date_add = new clsSorter($this->ComponentName, "Sorter_date_add", $FileName, $this);
        $this->Sorter_date_last_login = new clsSorter($this->ComponentName, "Sorter_date_last_login", $FileName, $this);
        $this->Sorter_ip_add = new clsSorter($this->ComponentName, "Sorter_ip_add", $FileName, $this);
        $this->Sorter_ip_update = new clsSorter($this->ComponentName, "Sorter_ip_update", $FileName, $this);
        $this->Sorter_language_id = new clsSorter($this->ComponentName, "Sorter_language_id", $FileName, $this);
        $this->Sorter_image_url = new clsSorter($this->ComponentName, "Sorter_image_url", $FileName, $this);
        $this->Sorter_age_id = new clsSorter($this->ComponentName, "Sorter_age_id", $FileName, $this);
        $this->Sorter_gender_id = new clsSorter($this->ComponentName, "Sorter_gender_id", $FileName, $this);
        $this->Sorter_education_id = new clsSorter($this->ComponentName, "Sorter_education_id", $FileName, $this);
        $this->Sorter_income_id = new clsSorter($this->ComponentName, "Sorter_income_id", $FileName, $this);
        $this->Sorter_user_SSN = new clsSorter($this->ComponentName, "Sorter_user_SSN", $FileName, $this);
        $this->Sorter_user_is_active = new clsSorter($this->ComponentName, "Sorter_user_is_active", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @30-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @30-92D64040
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_user_login"] = CCGetFromGet("s_user_login", NULL);
        $this->DataSource->Parameters["urls_first_name"] = CCGetFromGet("s_first_name", NULL);
        $this->DataSource->Parameters["urls_last_name"] = CCGetFromGet("s_last_name", NULL);
        $this->DataSource->Parameters["urls_title"] = CCGetFromGet("s_title", NULL);
        $this->DataSource->Parameters["urls_phone_home"] = CCGetFromGet("s_phone_home", NULL);
        $this->DataSource->Parameters["urls_phone_work"] = CCGetFromGet("s_phone_work", NULL);
        $this->DataSource->Parameters["urls_phone_day"] = CCGetFromGet("s_phone_day", NULL);
        $this->DataSource->Parameters["urls_phone_cell"] = CCGetFromGet("s_phone_cell", NULL);
        $this->DataSource->Parameters["urls_phone_evening"] = CCGetFromGet("s_phone_evening", NULL);
        $this->DataSource->Parameters["urls_fax"] = CCGetFromGet("s_fax", NULL);
        $this->DataSource->Parameters["urls_email"] = CCGetFromGet("s_email", NULL);
        $this->DataSource->Parameters["urls_notes"] = CCGetFromGet("s_notes", NULL);
        $this->DataSource->Parameters["urls_card_number"] = CCGetFromGet("s_card_number", NULL);
        $this->DataSource->Parameters["urls_card_expire_date"] = CCGetFromGet("s_card_expire_date", NULL);
        $this->DataSource->Parameters["urls_city"] = CCGetFromGet("s_city", NULL);
        $this->DataSource->Parameters["urls_zip"] = CCGetFromGet("s_zip", NULL);
        $this->DataSource->Parameters["urls_address1"] = CCGetFromGet("s_address1", NULL);
        $this->DataSource->Parameters["urls_address2"] = CCGetFromGet("s_address2", NULL);
        $this->DataSource->Parameters["urls_address3"] = CCGetFromGet("s_address3", NULL);
        $this->DataSource->Parameters["urls_ip_add"] = CCGetFromGet("s_ip_add", NULL);
        $this->DataSource->Parameters["urls_ip_update"] = CCGetFromGet("s_ip_update", NULL);
        $this->DataSource->Parameters["urls_image_url"] = CCGetFromGet("s_image_url", NULL);
        $this->DataSource->Parameters["urls_user_SSN"] = CCGetFromGet("s_user_SSN", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();
        $this->HasRecord = $this->DataSource->has_next_record();
        $this->IsEmpty = ! $this->HasRecord;
        $this->Attributes->Show();

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $GridBlock = "Grid " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $GridBlock;


        if (!$this->IsEmpty) {
            $this->ControlsVisible["user_id"] = $this->user_id->Visible;
            $this->ControlsVisible["user_login"] = $this->user_login->Visible;
            $this->ControlsVisible["first_name"] = $this->first_name->Visible;
            $this->ControlsVisible["last_name"] = $this->last_name->Visible;
            $this->ControlsVisible["title"] = $this->title->Visible;
            $this->ControlsVisible["group_id"] = $this->group_id->Visible;
            $this->ControlsVisible["phone_home"] = $this->phone_home->Visible;
            $this->ControlsVisible["phone_work"] = $this->phone_work->Visible;
            $this->ControlsVisible["phone_day"] = $this->phone_day->Visible;
            $this->ControlsVisible["phone_cell"] = $this->phone_cell->Visible;
            $this->ControlsVisible["phone_evening"] = $this->phone_evening->Visible;
            $this->ControlsVisible["fax"] = $this->fax->Visible;
            $this->ControlsVisible["email"] = $this->email->Visible;
            $this->ControlsVisible["card_number"] = $this->card_number->Visible;
            $this->ControlsVisible["card_expire_date"] = $this->card_expire_date->Visible;
            $this->ControlsVisible["country_id"] = $this->country_id->Visible;
            $this->ControlsVisible["state_id"] = $this->state_id->Visible;
            $this->ControlsVisible["city"] = $this->city->Visible;
            $this->ControlsVisible["zip"] = $this->zip->Visible;
            $this->ControlsVisible["address1"] = $this->address1->Visible;
            $this->ControlsVisible["address2"] = $this->address2->Visible;
            $this->ControlsVisible["address3"] = $this->address3->Visible;
            $this->ControlsVisible["date_add"] = $this->date_add->Visible;
            $this->ControlsVisible["date_last_login"] = $this->date_last_login->Visible;
            $this->ControlsVisible["ip_add"] = $this->ip_add->Visible;
            $this->ControlsVisible["ip_update"] = $this->ip_update->Visible;
            $this->ControlsVisible["language_id"] = $this->language_id->Visible;
            $this->ControlsVisible["image_url"] = $this->image_url->Visible;
            $this->ControlsVisible["age_id"] = $this->age_id->Visible;
            $this->ControlsVisible["gender_id"] = $this->gender_id->Visible;
            $this->ControlsVisible["education_id"] = $this->education_id->Visible;
            $this->ControlsVisible["income_id"] = $this->income_id->Visible;
            $this->ControlsVisible["user_SSN"] = $this->user_SSN->Visible;
            $this->ControlsVisible["user_is_active"] = $this->user_is_active->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->user_id->SetValue($this->DataSource->user_id->GetValue());
                $this->user_id->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->user_id->Parameters = CCAddParam($this->user_id->Parameters, "user_id", $this->DataSource->f("user_id"));
                $this->user_login->SetValue($this->DataSource->user_login->GetValue());
                $this->first_name->SetValue($this->DataSource->first_name->GetValue());
                $this->last_name->SetValue($this->DataSource->last_name->GetValue());
                $this->title->SetValue($this->DataSource->title->GetValue());
                $this->group_id->SetValue($this->DataSource->group_id->GetValue());
                $this->phone_home->SetValue($this->DataSource->phone_home->GetValue());
                $this->phone_work->SetValue($this->DataSource->phone_work->GetValue());
                $this->phone_day->SetValue($this->DataSource->phone_day->GetValue());
                $this->phone_cell->SetValue($this->DataSource->phone_cell->GetValue());
                $this->phone_evening->SetValue($this->DataSource->phone_evening->GetValue());
                $this->fax->SetValue($this->DataSource->fax->GetValue());
                $this->email->SetValue($this->DataSource->email->GetValue());
                $this->card_number->SetValue($this->DataSource->card_number->GetValue());
                $this->card_expire_date->SetValue($this->DataSource->card_expire_date->GetValue());
                $this->country_id->SetValue($this->DataSource->country_id->GetValue());
                $this->state_id->SetValue($this->DataSource->state_id->GetValue());
                $this->city->SetValue($this->DataSource->city->GetValue());
                $this->zip->SetValue($this->DataSource->zip->GetValue());
                $this->address1->SetValue($this->DataSource->address1->GetValue());
                $this->address2->SetValue($this->DataSource->address2->GetValue());
                $this->address3->SetValue($this->DataSource->address3->GetValue());
                $this->date_add->SetValue($this->DataSource->date_add->GetValue());
                $this->date_last_login->SetValue($this->DataSource->date_last_login->GetValue());
                $this->ip_add->SetValue($this->DataSource->ip_add->GetValue());
                $this->ip_update->SetValue($this->DataSource->ip_update->GetValue());
                $this->language_id->SetValue($this->DataSource->language_id->GetValue());
                $this->image_url->SetValue($this->DataSource->image_url->GetValue());
                $this->age_id->SetValue($this->DataSource->age_id->GetValue());
                $this->gender_id->SetValue($this->DataSource->gender_id->GetValue());
                $this->education_id->SetValue($this->DataSource->education_id->GetValue());
                $this->income_id->SetValue($this->DataSource->income_id->GetValue());
                $this->user_SSN->SetValue($this->DataSource->user_SSN->GetValue());
                $this->user_is_active->SetValue($this->DataSource->user_is_active->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->user_id->Show();
                $this->user_login->Show();
                $this->first_name->Show();
                $this->last_name->Show();
                $this->title->Show();
                $this->group_id->Show();
                $this->phone_home->Show();
                $this->phone_work->Show();
                $this->phone_day->Show();
                $this->phone_cell->Show();
                $this->phone_evening->Show();
                $this->fax->Show();
                $this->email->Show();
                $this->card_number->Show();
                $this->card_expire_date->Show();
                $this->country_id->Show();
                $this->state_id->Show();
                $this->city->Show();
                $this->zip->Show();
                $this->address1->Show();
                $this->address2->Show();
                $this->address3->Show();
                $this->date_add->Show();
                $this->date_last_login->Show();
                $this->ip_add->Show();
                $this->ip_update->Show();
                $this->language_id->Show();
                $this->image_url->Show();
                $this->age_id->Show();
                $this->gender_id->Show();
                $this->education_id->Show();
                $this->income_id->Show();
                $this->user_SSN->Show();
                $this->user_is_active->Show();
                $Tpl->block_path = $ParentPath . "/" . $GridBlock;
                $Tpl->parse("Row", true);
            }
        }
        else { // Show NoRecords block if no records are found
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $errors = $this->GetErrors();
        if(strlen($errors))
        {
            $Tpl->replaceblock("", $errors);
            $Tpl->block_path = $ParentPath;
            return;
        }
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if (($this->Navigator->TotalPages <= 1 && $this->Navigator->PageNumber == 1) || $this->Navigator->PageSize == "") {
            $this->Navigator->Visible = false;
        }
        $this->users_Insert->Show();
        $this->Sorter_user_id->Show();
        $this->Sorter_user_login->Show();
        $this->Sorter_first_name->Show();
        $this->Sorter_last_name->Show();
        $this->Sorter_title->Show();
        $this->Sorter_group_id->Show();
        $this->Sorter_phone_home->Show();
        $this->Sorter_phone_work->Show();
        $this->Sorter_phone_day->Show();
        $this->Sorter_phone_cell->Show();
        $this->Sorter_phone_evening->Show();
        $this->Sorter_fax->Show();
        $this->Sorter_email->Show();
        $this->Sorter_card_number->Show();
        $this->Sorter_card_expire_date->Show();
        $this->Sorter_country_id->Show();
        $this->Sorter_state_id->Show();
        $this->Sorter_city->Show();
        $this->Sorter_zip->Show();
        $this->Sorter_address1->Show();
        $this->Sorter_address2->Show();
        $this->Sorter_address3->Show();
        $this->Sorter_date_add->Show();
        $this->Sorter_date_last_login->Show();
        $this->Sorter_ip_add->Show();
        $this->Sorter_ip_update->Show();
        $this->Sorter_language_id->Show();
        $this->Sorter_image_url->Show();
        $this->Sorter_age_id->Show();
        $this->Sorter_gender_id->Show();
        $this->Sorter_education_id->Show();
        $this->Sorter_income_id->Show();
        $this->Sorter_user_SSN->Show();
        $this->Sorter_user_is_active->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @30-C23E1066
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->user_id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->user_login->Errors->ToString());
        $errors = ComposeStrings($errors, $this->first_name->Errors->ToString());
        $errors = ComposeStrings($errors, $this->last_name->Errors->ToString());
        $errors = ComposeStrings($errors, $this->title->Errors->ToString());
        $errors = ComposeStrings($errors, $this->group_id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->phone_home->Errors->ToString());
        $errors = ComposeStrings($errors, $this->phone_work->Errors->ToString());
        $errors = ComposeStrings($errors, $this->phone_day->Errors->ToString());
        $errors = ComposeStrings($errors, $this->phone_cell->Errors->ToString());
        $errors = ComposeStrings($errors, $this->phone_evening->Errors->ToString());
        $errors = ComposeStrings($errors, $this->fax->Errors->ToString());
        $errors = ComposeStrings($errors, $this->email->Errors->ToString());
        $errors = ComposeStrings($errors, $this->card_number->Errors->ToString());
        $errors = ComposeStrings($errors, $this->card_expire_date->Errors->ToString());
        $errors = ComposeStrings($errors, $this->country_id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->state_id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->city->Errors->ToString());
        $errors = ComposeStrings($errors, $this->zip->Errors->ToString());
        $errors = ComposeStrings($errors, $this->address1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->address2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->address3->Errors->ToString());
        $errors = ComposeStrings($errors, $this->date_add->Errors->ToString());
        $errors = ComposeStrings($errors, $this->date_last_login->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ip_add->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ip_update->Errors->ToString());
        $errors = ComposeStrings($errors, $this->language_id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->image_url->Errors->ToString());
        $errors = ComposeStrings($errors, $this->age_id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->gender_id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->education_id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->income_id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->user_SSN->Errors->ToString());
        $errors = ComposeStrings($errors, $this->user_is_active->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End users Class @30-FCB6E20C

class clsusersDataSource extends clsDBmyproject {  //usersDataSource Class @30-450B5E7B

//DataSource Variables @30-1CBDF8DF
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $user_id;
    public $user_login;
    public $first_name;
    public $last_name;
    public $title;
    public $group_id;
    public $phone_home;
    public $phone_work;
    public $phone_day;
    public $phone_cell;
    public $phone_evening;
    public $fax;
    public $email;
    public $card_number;
    public $card_expire_date;
    public $country_id;
    public $state_id;
    public $city;
    public $zip;
    public $address1;
    public $address2;
    public $address3;
    public $date_add;
    public $date_last_login;
    public $ip_add;
    public $ip_update;
    public $language_id;
    public $image_url;
    public $age_id;
    public $gender_id;
    public $education_id;
    public $income_id;
    public $user_SSN;
    public $user_is_active;
//End DataSource Variables

//DataSourceClass_Initialize Event @30-04BEB5AC
    function clsusersDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid users";
        $this->Initialize();
        $this->user_id = new clsField("user_id", ccsInteger, "");
        
        $this->user_login = new clsField("user_login", ccsText, "");
        
        $this->first_name = new clsField("first_name", ccsText, "");
        
        $this->last_name = new clsField("last_name", ccsText, "");
        
        $this->title = new clsField("title", ccsText, "");
        
        $this->group_id = new clsField("group_id", ccsInteger, "");
        
        $this->phone_home = new clsField("phone_home", ccsText, "");
        
        $this->phone_work = new clsField("phone_work", ccsText, "");
        
        $this->phone_day = new clsField("phone_day", ccsText, "");
        
        $this->phone_cell = new clsField("phone_cell", ccsText, "");
        
        $this->phone_evening = new clsField("phone_evening", ccsText, "");
        
        $this->fax = new clsField("fax", ccsText, "");
        
        $this->email = new clsField("email", ccsText, "");
        
        $this->card_number = new clsField("card_number", ccsText, "");
        
        $this->card_expire_date = new clsField("card_expire_date", ccsText, "");
        
        $this->country_id = new clsField("country_id", ccsInteger, "");
        
        $this->state_id = new clsField("state_id", ccsInteger, "");
        
        $this->city = new clsField("city", ccsText, "");
        
        $this->zip = new clsField("zip", ccsText, "");
        
        $this->address1 = new clsField("address1", ccsText, "");
        
        $this->address2 = new clsField("address2", ccsText, "");
        
        $this->address3 = new clsField("address3", ccsText, "");
        
        $this->date_add = new clsField("date_add", ccsDate, $this->DateFormat);
        
        $this->date_last_login = new clsField("date_last_login", ccsDate, $this->DateFormat);
        
        $this->ip_add = new clsField("ip_add", ccsText, "");
        
        $this->ip_update = new clsField("ip_update", ccsText, "");
        
        $this->language_id = new clsField("language_id", ccsInteger, "");
        
        $this->image_url = new clsField("image_url", ccsText, "");
        
        $this->age_id = new clsField("age_id", ccsInteger, "");
        
        $this->gender_id = new clsField("gender_id", ccsInteger, "");
        
        $this->education_id = new clsField("education_id", ccsInteger, "");
        
        $this->income_id = new clsField("income_id", ccsInteger, "");
        
        $this->user_SSN = new clsField("user_SSN", ccsText, "");
        
        $this->user_is_active = new clsField("user_is_active", ccsBoolean, $this->BooleanFormat);
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @30-6DF1FCC0
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_user_id" => array("user_id", ""), 
            "Sorter_user_login" => array("user_login", ""), 
            "Sorter_first_name" => array("first_name", ""), 
            "Sorter_last_name" => array("last_name", ""), 
            "Sorter_title" => array("title", ""), 
            "Sorter_group_id" => array("group_id", ""), 
            "Sorter_phone_home" => array("phone_home", ""), 
            "Sorter_phone_work" => array("phone_work", ""), 
            "Sorter_phone_day" => array("phone_day", ""), 
            "Sorter_phone_cell" => array("phone_cell", ""), 
            "Sorter_phone_evening" => array("phone_evening", ""), 
            "Sorter_fax" => array("fax", ""), 
            "Sorter_email" => array("email", ""), 
            "Sorter_card_number" => array("card_number", ""), 
            "Sorter_card_expire_date" => array("card_expire_date", ""), 
            "Sorter_country_id" => array("country_id", ""), 
            "Sorter_state_id" => array("state_id", ""), 
            "Sorter_city" => array("city", ""), 
            "Sorter_zip" => array("zip", ""), 
            "Sorter_address1" => array("address1", ""), 
            "Sorter_address2" => array("address2", ""), 
            "Sorter_address3" => array("address3", ""), 
            "Sorter_date_add" => array("date_add", ""), 
            "Sorter_date_last_login" => array("date_last_login", ""), 
            "Sorter_ip_add" => array("ip_add", ""), 
            "Sorter_ip_update" => array("ip_update", ""), 
            "Sorter_language_id" => array("language_id", ""), 
            "Sorter_image_url" => array("image_url", ""), 
            "Sorter_age_id" => array("age_id", ""), 
            "Sorter_gender_id" => array("gender_id", ""), 
            "Sorter_education_id" => array("education_id", ""), 
            "Sorter_income_id" => array("income_id", ""), 
            "Sorter_user_SSN" => array("user_SSN", ""), 
            "Sorter_user_is_active" => array("user_is_active", "")));
    }
//End SetOrder Method

//Prepare Method @30-A2EB7CF3
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_user_login", ccsText, "", "", $this->Parameters["urls_user_login"], "", false);
        $this->wp->AddParameter("2", "urls_first_name", ccsText, "", "", $this->Parameters["urls_first_name"], "", false);
        $this->wp->AddParameter("3", "urls_last_name", ccsText, "", "", $this->Parameters["urls_last_name"], "", false);
        $this->wp->AddParameter("4", "urls_title", ccsText, "", "", $this->Parameters["urls_title"], "", false);
        $this->wp->AddParameter("5", "urls_phone_home", ccsText, "", "", $this->Parameters["urls_phone_home"], "", false);
        $this->wp->AddParameter("6", "urls_phone_work", ccsText, "", "", $this->Parameters["urls_phone_work"], "", false);
        $this->wp->AddParameter("7", "urls_phone_day", ccsText, "", "", $this->Parameters["urls_phone_day"], "", false);
        $this->wp->AddParameter("8", "urls_phone_cell", ccsText, "", "", $this->Parameters["urls_phone_cell"], "", false);
        $this->wp->AddParameter("9", "urls_phone_evening", ccsText, "", "", $this->Parameters["urls_phone_evening"], "", false);
        $this->wp->AddParameter("10", "urls_fax", ccsText, "", "", $this->Parameters["urls_fax"], "", false);
        $this->wp->AddParameter("11", "urls_email", ccsText, "", "", $this->Parameters["urls_email"], "", false);
        $this->wp->AddParameter("12", "urls_notes", ccsMemo, "", "", $this->Parameters["urls_notes"], "", false);
        $this->wp->AddParameter("13", "urls_card_number", ccsText, "", "", $this->Parameters["urls_card_number"], "", false);
        $this->wp->AddParameter("14", "urls_card_expire_date", ccsText, "", "", $this->Parameters["urls_card_expire_date"], "", false);
        $this->wp->AddParameter("15", "urls_city", ccsText, "", "", $this->Parameters["urls_city"], "", false);
        $this->wp->AddParameter("16", "urls_zip", ccsText, "", "", $this->Parameters["urls_zip"], "", false);
        $this->wp->AddParameter("17", "urls_address1", ccsText, "", "", $this->Parameters["urls_address1"], "", false);
        $this->wp->AddParameter("18", "urls_address2", ccsText, "", "", $this->Parameters["urls_address2"], "", false);
        $this->wp->AddParameter("19", "urls_address3", ccsText, "", "", $this->Parameters["urls_address3"], "", false);
        $this->wp->AddParameter("20", "urls_ip_add", ccsText, "", "", $this->Parameters["urls_ip_add"], "", false);
        $this->wp->AddParameter("21", "urls_ip_update", ccsText, "", "", $this->Parameters["urls_ip_update"], "", false);
        $this->wp->AddParameter("22", "urls_image_url", ccsText, "", "", $this->Parameters["urls_image_url"], "", false);
        $this->wp->AddParameter("23", "urls_user_SSN", ccsText, "", "", $this->Parameters["urls_user_SSN"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opContains, "user_login", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "first_name", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "last_name", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsText),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opContains, "title", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opContains, "phone_home", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsText),false);
        $this->wp->Criterion[6] = $this->wp->Operation(opContains, "phone_work", $this->wp->GetDBValue("6"), $this->ToSQL($this->wp->GetDBValue("6"), ccsText),false);
        $this->wp->Criterion[7] = $this->wp->Operation(opContains, "phone_day", $this->wp->GetDBValue("7"), $this->ToSQL($this->wp->GetDBValue("7"), ccsText),false);
        $this->wp->Criterion[8] = $this->wp->Operation(opContains, "phone_cell", $this->wp->GetDBValue("8"), $this->ToSQL($this->wp->GetDBValue("8"), ccsText),false);
        $this->wp->Criterion[9] = $this->wp->Operation(opContains, "phone_evening", $this->wp->GetDBValue("9"), $this->ToSQL($this->wp->GetDBValue("9"), ccsText),false);
        $this->wp->Criterion[10] = $this->wp->Operation(opContains, "fax", $this->wp->GetDBValue("10"), $this->ToSQL($this->wp->GetDBValue("10"), ccsText),false);
        $this->wp->Criterion[11] = $this->wp->Operation(opContains, "email", $this->wp->GetDBValue("11"), $this->ToSQL($this->wp->GetDBValue("11"), ccsText),false);
        $this->wp->Criterion[12] = $this->wp->Operation(opContains, "notes", $this->wp->GetDBValue("12"), $this->ToSQL($this->wp->GetDBValue("12"), ccsMemo),false);
        $this->wp->Criterion[13] = $this->wp->Operation(opContains, "card_number", $this->wp->GetDBValue("13"), $this->ToSQL($this->wp->GetDBValue("13"), ccsText),false);
        $this->wp->Criterion[14] = $this->wp->Operation(opContains, "card_expire_date", $this->wp->GetDBValue("14"), $this->ToSQL($this->wp->GetDBValue("14"), ccsText),false);
        $this->wp->Criterion[15] = $this->wp->Operation(opContains, "city", $this->wp->GetDBValue("15"), $this->ToSQL($this->wp->GetDBValue("15"), ccsText),false);
        $this->wp->Criterion[16] = $this->wp->Operation(opContains, "zip", $this->wp->GetDBValue("16"), $this->ToSQL($this->wp->GetDBValue("16"), ccsText),false);
        $this->wp->Criterion[17] = $this->wp->Operation(opContains, "address1", $this->wp->GetDBValue("17"), $this->ToSQL($this->wp->GetDBValue("17"), ccsText),false);
        $this->wp->Criterion[18] = $this->wp->Operation(opContains, "address2", $this->wp->GetDBValue("18"), $this->ToSQL($this->wp->GetDBValue("18"), ccsText),false);
        $this->wp->Criterion[19] = $this->wp->Operation(opContains, "address3", $this->wp->GetDBValue("19"), $this->ToSQL($this->wp->GetDBValue("19"), ccsText),false);
        $this->wp->Criterion[20] = $this->wp->Operation(opContains, "ip_add", $this->wp->GetDBValue("20"), $this->ToSQL($this->wp->GetDBValue("20"), ccsText),false);
        $this->wp->Criterion[21] = $this->wp->Operation(opContains, "ip_update", $this->wp->GetDBValue("21"), $this->ToSQL($this->wp->GetDBValue("21"), ccsText),false);
        $this->wp->Criterion[22] = $this->wp->Operation(opContains, "image_url", $this->wp->GetDBValue("22"), $this->ToSQL($this->wp->GetDBValue("22"), ccsText),false);
        $this->wp->Criterion[23] = $this->wp->Operation(opContains, "user_SSN", $this->wp->GetDBValue("23"), $this->ToSQL($this->wp->GetDBValue("23"), ccsText),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]), 
             $this->wp->Criterion[6]), 
             $this->wp->Criterion[7]), 
             $this->wp->Criterion[8]), 
             $this->wp->Criterion[9]), 
             $this->wp->Criterion[10]), 
             $this->wp->Criterion[11]), 
             $this->wp->Criterion[12]), 
             $this->wp->Criterion[13]), 
             $this->wp->Criterion[14]), 
             $this->wp->Criterion[15]), 
             $this->wp->Criterion[16]), 
             $this->wp->Criterion[17]), 
             $this->wp->Criterion[18]), 
             $this->wp->Criterion[19]), 
             $this->wp->Criterion[20]), 
             $this->wp->Criterion[21]), 
             $this->wp->Criterion[22]), 
             $this->wp->Criterion[23]);
    }
//End Prepare Method

//Open Method @30-2BD99CFC
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM users";
        $this->SQL = "SELECT user_id, user_login, first_name, last_name, title, group_id, phone_home, phone_work, phone_day, phone_cell, phone_evening,\n\n" .
        "fax, email, card_number, card_expire_date, country_id, state_id, city, zip, address1, address2, address3, date_add, date_last_login,\n\n" .
        "ip_add, ip_update, language_id, image_url, age_id, gender_id, education_id, income_id, user_SSN, user_is_active \n\n" .
        "FROM users {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
        $this->MoveToPage($this->AbsolutePage);
    }
//End Open Method

//SetValues Method @30-A53BB5EE
    function SetValues()
    {
        $this->user_id->SetDBValue(trim($this->f("user_id")));
        $this->user_login->SetDBValue($this->f("user_login"));
        $this->first_name->SetDBValue($this->f("first_name"));
        $this->last_name->SetDBValue($this->f("last_name"));
        $this->title->SetDBValue($this->f("title"));
        $this->group_id->SetDBValue(trim($this->f("group_id")));
        $this->phone_home->SetDBValue($this->f("phone_home"));
        $this->phone_work->SetDBValue($this->f("phone_work"));
        $this->phone_day->SetDBValue($this->f("phone_day"));
        $this->phone_cell->SetDBValue($this->f("phone_cell"));
        $this->phone_evening->SetDBValue($this->f("phone_evening"));
        $this->fax->SetDBValue($this->f("fax"));
        $this->email->SetDBValue($this->f("email"));
        $this->card_number->SetDBValue($this->f("card_number"));
        $this->card_expire_date->SetDBValue($this->f("card_expire_date"));
        $this->country_id->SetDBValue(trim($this->f("country_id")));
        $this->state_id->SetDBValue(trim($this->f("state_id")));
        $this->city->SetDBValue($this->f("city"));
        $this->zip->SetDBValue($this->f("zip"));
        $this->address1->SetDBValue($this->f("address1"));
        $this->address2->SetDBValue($this->f("address2"));
        $this->address3->SetDBValue($this->f("address3"));
        $this->date_add->SetDBValue(trim($this->f("date_add")));
        $this->date_last_login->SetDBValue(trim($this->f("date_last_login")));
        $this->ip_add->SetDBValue($this->f("ip_add"));
        $this->ip_update->SetDBValue($this->f("ip_update"));
        $this->language_id->SetDBValue(trim($this->f("language_id")));
        $this->image_url->SetDBValue($this->f("image_url"));
        $this->age_id->SetDBValue(trim($this->f("age_id")));
        $this->gender_id->SetDBValue(trim($this->f("gender_id")));
        $this->education_id->SetDBValue(trim($this->f("education_id")));
        $this->income_id->SetDBValue(trim($this->f("income_id")));
        $this->user_SSN->SetDBValue($this->f("user_SSN"));
        $this->user_is_active->SetDBValue(trim($this->f("user_is_active")));
    }
//End SetValues Method

} //End usersDataSource Class @30-FCB6E20C

//Include Page implementation @167-07AA2166
include_once(RelativePath . "/MenuIncludablePage.php");
//End Include Page implementation

//Initialize Page @1-1C4CF129
// Variables
$FileName = "";
$Redirect = "";
$Tpl = "";
$TemplateFileName = "";
$BlockToParse = "";
$ComponentName = "";
$Attributes = "";
$PathToCurrentMasterPage = "";
$TemplatePathValue = "";

// Events;
$CCSEvents = "";
$CCSEventResult = "";
$MasterPage = null;
$TemplateSource = "";

$FileName = FileName;
$Redirect = "";
$TemplateFileName = "users_list.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|js/jquery/updatepanel/ccs-update-panel.js|";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Include events file @1-13285D66
include_once("./users_list_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-5DE5E8D5
$DBmyproject = new clsDBmyproject();
$MainPage->Connections["myproject"] = & $DBmyproject;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$MasterPage = new clsMasterPage("/Designs/" . $CCProjectDesign . "/", "MasterPage", $MainPage);
$MasterPage->Attributes = $Attributes;
$MasterPage->Initialize();
$Head = new clsPanel("Head", $MainPage);
$Head->PlaceholderName = "Head";
$Content = new clsPanel("Content", $MainPage);
$Content->PlaceholderName = "Content";
$Panel1 = new clsPanel("Panel1", $MainPage);
$Panel1->GenerateDiv = true;
$Panel1->PanelId = "ContentPanel1";
$usersSearch = new clsRecordusersSearch("", $MainPage);
$users = new clsGridusers("", $MainPage);
$Menu = new clsPanel("Menu", $MainPage);
$Menu->PlaceholderName = "Menu";
$MenuIncludablePage = new clsMenuIncludablePage("", "MenuIncludablePage", $MainPage);
$MenuIncludablePage->Initialize();
$Sidebar1 = new clsPanel("Sidebar1", $MainPage);
$Sidebar1->PlaceholderName = "Sidebar1";
$HeaderSidebar = new clsPanel("HeaderSidebar", $MainPage);
$HeaderSidebar->PlaceholderName = "HeaderSidebar";
$MainPage->Head = & $Head;
$MainPage->Content = & $Content;
$MainPage->Panel1 = & $Panel1;
$MainPage->usersSearch = & $usersSearch;
$MainPage->users = & $users;
$MainPage->Menu = & $Menu;
$MainPage->MenuIncludablePage = & $MenuIncludablePage;
$MainPage->Sidebar1 = & $Sidebar1;
$MainPage->HeaderSidebar = & $HeaderSidebar;
$Content->AddComponent("Panel1", $Panel1);
$Panel1->AddComponent("usersSearch", $usersSearch);
$Panel1->AddComponent("users", $users);
$Menu->AddComponent("MenuIncludablePage", $MenuIncludablePage);
$users->Initialize();
$ScriptIncludes = "";
$SList = explode("|", $Scripts);
foreach ($SList as $Script) {
    if ($Script != "") $ScriptIncludes = $ScriptIncludes . "<script src=\"" . $PathToRoot . $Script . "\" type=\"text/javascript\"></script>\n";
}
$Attributes->SetValue("scriptIncludes", $ScriptIncludes);

BindEvents();

$CCSEventResult = CCGetEvent($CCSEvents, "AfterInitialize", $MainPage);

if ($Charset) {
    header("Content-Type: " . $ContentType . "; charset=" . $Charset);
} else {
    header("Content-Type: " . $ContentType);
}
//End Initialize Objects

//Initialize HTML Template @1-577E43E0
$CCSEventResult = CCGetEvent($CCSEvents, "OnInitializeView", $MainPage);
$Tpl = new clsTemplate($FileEncoding, $TemplateEncoding);
if (strlen($TemplateSource)) {
    $Tpl->LoadTemplateFromStr($TemplateSource, $BlockToParse, "UTF-8", "replace");
} else {
    $Tpl->LoadTemplate(PathToCurrentPage . $TemplateFileName, $BlockToParse, "UTF-8", "replace");
}
$Tpl->SetVar("CCS_PathToRoot", $PathToRoot);
$Tpl->SetVar("CCS_PathToMasterPage", RelativePath . $PathToCurrentMasterPage);
$Tpl->block_path = "/$BlockToParse";
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeShow", $MainPage);
$Attributes->SetValue("pathToRoot", "");
$Attributes->Show();
//End Initialize HTML Template

//Execute Components @1-529D8848
$MasterPage->Operations();
$MenuIncludablePage->Operations();
$usersSearch->Operation();
//End Execute Components

//Go to destination page @1-5F50949F
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBmyproject->close();
    header("Location: " . $Redirect);
    unset($usersSearch);
    unset($users);
    $MenuIncludablePage->Class_Terminate();
    unset($MenuIncludablePage);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-E24D7EEF
$Head->Show();
$Content->Show();
$Menu->Show();
$Sidebar1->Show();
$HeaderSidebar->Show();
$MasterPage->Tpl->SetVar("Head", $Tpl->GetVar("Panel Head"));
$MasterPage->Tpl->SetVar("Content", $Tpl->GetVar("Panel Content"));
$MasterPage->Tpl->SetVar("Menu", $Tpl->GetVar("Panel Menu"));
$MasterPage->Tpl->SetVar("Sidebar1", $Tpl->GetVar("Panel Sidebar1"));
$MasterPage->Tpl->SetVar("HeaderSidebar", $Tpl->GetVar("Panel HeaderSidebar"));
$MasterPage->Show();
if (!isset($main_block)) $main_block = $MasterPage->HTML;
$main_block = CCConvertEncoding($main_block, $FileEncoding, $CCSLocales->GetFormatInfo("Encoding"));
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-19AB954E
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBmyproject->close();
unset($MasterPage);
unset($usersSearch);
unset($users);
$MenuIncludablePage->Class_Terminate();
unset($MenuIncludablePage);
unset($Tpl);
//End Unload Page


?>
