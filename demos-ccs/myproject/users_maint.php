<?php

//Error reporting @1-8F636958
error_reporting(E_ALL | E_STRICT);
//End Error reporting

//Include Common Files @1-742AC96F
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "users_maint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Master Page implementation @1-703C09F6
include_once(RelativePath . "/Designs/theme-gc-intranet/MasterPage.php");
//End Master Page implementation

class clsRecordusers { //users Class @2-9BE1AF6F

//Variables @2-9E315808

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

//Class_Initialize Event @2-2053861C
    function clsRecordusers($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record users/Error";
        $this->DataSource = new clsusersDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "users";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Insert = new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = new clsButton("Button_Delete", $Method, $this);
            $this->user_login = new clsControl(ccsTextBox, "user_login", $CCSLocales->GetText("user_login"), ccsText, "", CCGetRequestParam("user_login", $Method, NULL), $this);
            $this->user_password = new clsControl(ccsTextBox, "user_password", $CCSLocales->GetText("user_password"), ccsText, "", CCGetRequestParam("user_password", $Method, NULL), $this);
            $this->first_name = new clsControl(ccsTextBox, "first_name", $CCSLocales->GetText("first_name"), ccsText, "", CCGetRequestParam("first_name", $Method, NULL), $this);
            $this->last_name = new clsControl(ccsTextBox, "last_name", $CCSLocales->GetText("last_name"), ccsText, "", CCGetRequestParam("last_name", $Method, NULL), $this);
            $this->title = new clsControl(ccsTextBox, "title", $CCSLocales->GetText("title"), ccsText, "", CCGetRequestParam("title", $Method, NULL), $this);
            $this->group_id = new clsControl(ccsTextBox, "group_id", $CCSLocales->GetText("group_id"), ccsInteger, "", CCGetRequestParam("group_id", $Method, NULL), $this);
            $this->phone_home = new clsControl(ccsTextBox, "phone_home", $CCSLocales->GetText("phone_home"), ccsText, "", CCGetRequestParam("phone_home", $Method, NULL), $this);
            $this->phone_work = new clsControl(ccsTextBox, "phone_work", $CCSLocales->GetText("phone_work"), ccsText, "", CCGetRequestParam("phone_work", $Method, NULL), $this);
            $this->phone_day = new clsControl(ccsTextBox, "phone_day", $CCSLocales->GetText("phone_day"), ccsText, "", CCGetRequestParam("phone_day", $Method, NULL), $this);
            $this->phone_cell = new clsControl(ccsTextBox, "phone_cell", $CCSLocales->GetText("phone_cell"), ccsText, "", CCGetRequestParam("phone_cell", $Method, NULL), $this);
            $this->phone_evening = new clsControl(ccsTextBox, "phone_evening", $CCSLocales->GetText("phone_evening"), ccsText, "", CCGetRequestParam("phone_evening", $Method, NULL), $this);
            $this->fax = new clsControl(ccsTextBox, "fax", $CCSLocales->GetText("fax"), ccsText, "", CCGetRequestParam("fax", $Method, NULL), $this);
            $this->email = new clsControl(ccsTextBox, "email", $CCSLocales->GetText("email"), ccsText, "", CCGetRequestParam("email", $Method, NULL), $this);
            $this->notes = new clsControl(ccsTextArea, "notes", $CCSLocales->GetText("notes"), ccsMemo, "", CCGetRequestParam("notes", $Method, NULL), $this);
            $this->card_number = new clsControl(ccsTextBox, "card_number", $CCSLocales->GetText("card_number"), ccsText, "", CCGetRequestParam("card_number", $Method, NULL), $this);
            $this->card_expire_date = new clsControl(ccsTextBox, "card_expire_date", $CCSLocales->GetText("card_expire_date"), ccsText, "", CCGetRequestParam("card_expire_date", $Method, NULL), $this);
            $this->country_id = new clsControl(ccsTextBox, "country_id", $CCSLocales->GetText("country_id"), ccsInteger, "", CCGetRequestParam("country_id", $Method, NULL), $this);
            $this->state_id = new clsControl(ccsTextBox, "state_id", $CCSLocales->GetText("state_id"), ccsInteger, "", CCGetRequestParam("state_id", $Method, NULL), $this);
            $this->city = new clsControl(ccsTextBox, "city", $CCSLocales->GetText("city"), ccsText, "", CCGetRequestParam("city", $Method, NULL), $this);
            $this->zip = new clsControl(ccsTextBox, "zip", $CCSLocales->GetText("zip"), ccsText, "", CCGetRequestParam("zip", $Method, NULL), $this);
            $this->address1 = new clsControl(ccsTextBox, "address1", $CCSLocales->GetText("address1"), ccsText, "", CCGetRequestParam("address1", $Method, NULL), $this);
            $this->address2 = new clsControl(ccsTextBox, "address2", $CCSLocales->GetText("address2"), ccsText, "", CCGetRequestParam("address2", $Method, NULL), $this);
            $this->address3 = new clsControl(ccsTextBox, "address3", $CCSLocales->GetText("address3"), ccsText, "", CCGetRequestParam("address3", $Method, NULL), $this);
            $this->date_add = new clsControl(ccsTextBox, "date_add", $CCSLocales->GetText("date_add"), ccsDate, array("ShortDate"), CCGetRequestParam("date_add", $Method, NULL), $this);
            $this->date_last_login = new clsControl(ccsTextBox, "date_last_login", $CCSLocales->GetText("date_last_login"), ccsDate, array("ShortDate"), CCGetRequestParam("date_last_login", $Method, NULL), $this);
            $this->ip_add = new clsControl(ccsTextBox, "ip_add", $CCSLocales->GetText("ip_add"), ccsText, "", CCGetRequestParam("ip_add", $Method, NULL), $this);
            $this->ip_update = new clsControl(ccsTextBox, "ip_update", $CCSLocales->GetText("ip_update"), ccsText, "", CCGetRequestParam("ip_update", $Method, NULL), $this);
            $this->language_id = new clsControl(ccsTextBox, "language_id", $CCSLocales->GetText("language_id"), ccsInteger, "", CCGetRequestParam("language_id", $Method, NULL), $this);
            $this->image_url = new clsControl(ccsTextBox, "image_url", $CCSLocales->GetText("image_url"), ccsText, "", CCGetRequestParam("image_url", $Method, NULL), $this);
            $this->age_id = new clsControl(ccsTextBox, "age_id", $CCSLocales->GetText("age_id"), ccsInteger, "", CCGetRequestParam("age_id", $Method, NULL), $this);
            $this->gender_id = new clsControl(ccsTextBox, "gender_id", $CCSLocales->GetText("gender_id"), ccsInteger, "", CCGetRequestParam("gender_id", $Method, NULL), $this);
            $this->education_id = new clsControl(ccsTextBox, "education_id", $CCSLocales->GetText("education_id"), ccsInteger, "", CCGetRequestParam("education_id", $Method, NULL), $this);
            $this->income_id = new clsControl(ccsTextBox, "income_id", $CCSLocales->GetText("income_id"), ccsInteger, "", CCGetRequestParam("income_id", $Method, NULL), $this);
            $this->user_SSN = new clsControl(ccsTextBox, "user_SSN", $CCSLocales->GetText("user_SSN"), ccsText, "", CCGetRequestParam("user_SSN", $Method, NULL), $this);
            $this->user_is_active = new clsControl(ccsCheckBox, "user_is_active", "user_is_active", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("user_is_active", $Method, NULL), $this);
            $this->user_is_active->CheckedValue = true;
            $this->user_is_active->UncheckedValue = false;
            $this->user_password_Shadow = new clsControl(ccsHidden, "user_password_Shadow", "user_password_Shadow", ccsText, "", CCGetRequestParam("user_password_Shadow", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->user_is_active->Value) && !strlen($this->user_is_active->Value) && $this->user_is_active->Value !== false)
                    $this->user_is_active->SetValue(false);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @2-53A359F1
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urluser_id"] = CCGetFromGet("user_id", NULL);
    }
//End Initialize Method

//Validate Method @2-6E40CD9D
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->user_login->Validate() && $Validation);
        $Validation = ($this->user_password->Validate() && $Validation);
        $Validation = ($this->first_name->Validate() && $Validation);
        $Validation = ($this->last_name->Validate() && $Validation);
        $Validation = ($this->title->Validate() && $Validation);
        $Validation = ($this->group_id->Validate() && $Validation);
        $Validation = ($this->phone_home->Validate() && $Validation);
        $Validation = ($this->phone_work->Validate() && $Validation);
        $Validation = ($this->phone_day->Validate() && $Validation);
        $Validation = ($this->phone_cell->Validate() && $Validation);
        $Validation = ($this->phone_evening->Validate() && $Validation);
        $Validation = ($this->fax->Validate() && $Validation);
        $Validation = ($this->email->Validate() && $Validation);
        $Validation = ($this->notes->Validate() && $Validation);
        $Validation = ($this->card_number->Validate() && $Validation);
        $Validation = ($this->card_expire_date->Validate() && $Validation);
        $Validation = ($this->country_id->Validate() && $Validation);
        $Validation = ($this->state_id->Validate() && $Validation);
        $Validation = ($this->city->Validate() && $Validation);
        $Validation = ($this->zip->Validate() && $Validation);
        $Validation = ($this->address1->Validate() && $Validation);
        $Validation = ($this->address2->Validate() && $Validation);
        $Validation = ($this->address3->Validate() && $Validation);
        $Validation = ($this->date_add->Validate() && $Validation);
        $Validation = ($this->date_last_login->Validate() && $Validation);
        $Validation = ($this->ip_add->Validate() && $Validation);
        $Validation = ($this->ip_update->Validate() && $Validation);
        $Validation = ($this->language_id->Validate() && $Validation);
        $Validation = ($this->image_url->Validate() && $Validation);
        $Validation = ($this->age_id->Validate() && $Validation);
        $Validation = ($this->gender_id->Validate() && $Validation);
        $Validation = ($this->education_id->Validate() && $Validation);
        $Validation = ($this->income_id->Validate() && $Validation);
        $Validation = ($this->user_SSN->Validate() && $Validation);
        $Validation = ($this->user_is_active->Validate() && $Validation);
        $Validation = ($this->user_password_Shadow->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->user_login->Errors->Count() == 0);
        $Validation =  $Validation && ($this->user_password->Errors->Count() == 0);
        $Validation =  $Validation && ($this->first_name->Errors->Count() == 0);
        $Validation =  $Validation && ($this->last_name->Errors->Count() == 0);
        $Validation =  $Validation && ($this->title->Errors->Count() == 0);
        $Validation =  $Validation && ($this->group_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->phone_home->Errors->Count() == 0);
        $Validation =  $Validation && ($this->phone_work->Errors->Count() == 0);
        $Validation =  $Validation && ($this->phone_day->Errors->Count() == 0);
        $Validation =  $Validation && ($this->phone_cell->Errors->Count() == 0);
        $Validation =  $Validation && ($this->phone_evening->Errors->Count() == 0);
        $Validation =  $Validation && ($this->fax->Errors->Count() == 0);
        $Validation =  $Validation && ($this->email->Errors->Count() == 0);
        $Validation =  $Validation && ($this->notes->Errors->Count() == 0);
        $Validation =  $Validation && ($this->card_number->Errors->Count() == 0);
        $Validation =  $Validation && ($this->card_expire_date->Errors->Count() == 0);
        $Validation =  $Validation && ($this->country_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->state_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->city->Errors->Count() == 0);
        $Validation =  $Validation && ($this->zip->Errors->Count() == 0);
        $Validation =  $Validation && ($this->address1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->address2->Errors->Count() == 0);
        $Validation =  $Validation && ($this->address3->Errors->Count() == 0);
        $Validation =  $Validation && ($this->date_add->Errors->Count() == 0);
        $Validation =  $Validation && ($this->date_last_login->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ip_add->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ip_update->Errors->Count() == 0);
        $Validation =  $Validation && ($this->language_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->image_url->Errors->Count() == 0);
        $Validation =  $Validation && ($this->age_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->gender_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->education_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->income_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->user_SSN->Errors->Count() == 0);
        $Validation =  $Validation && ($this->user_is_active->Errors->Count() == 0);
        $Validation =  $Validation && ($this->user_password_Shadow->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-E12B0725
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->user_login->Errors->Count());
        $errors = ($errors || $this->user_password->Errors->Count());
        $errors = ($errors || $this->first_name->Errors->Count());
        $errors = ($errors || $this->last_name->Errors->Count());
        $errors = ($errors || $this->title->Errors->Count());
        $errors = ($errors || $this->group_id->Errors->Count());
        $errors = ($errors || $this->phone_home->Errors->Count());
        $errors = ($errors || $this->phone_work->Errors->Count());
        $errors = ($errors || $this->phone_day->Errors->Count());
        $errors = ($errors || $this->phone_cell->Errors->Count());
        $errors = ($errors || $this->phone_evening->Errors->Count());
        $errors = ($errors || $this->fax->Errors->Count());
        $errors = ($errors || $this->email->Errors->Count());
        $errors = ($errors || $this->notes->Errors->Count());
        $errors = ($errors || $this->card_number->Errors->Count());
        $errors = ($errors || $this->card_expire_date->Errors->Count());
        $errors = ($errors || $this->country_id->Errors->Count());
        $errors = ($errors || $this->state_id->Errors->Count());
        $errors = ($errors || $this->city->Errors->Count());
        $errors = ($errors || $this->zip->Errors->Count());
        $errors = ($errors || $this->address1->Errors->Count());
        $errors = ($errors || $this->address2->Errors->Count());
        $errors = ($errors || $this->address3->Errors->Count());
        $errors = ($errors || $this->date_add->Errors->Count());
        $errors = ($errors || $this->date_last_login->Errors->Count());
        $errors = ($errors || $this->ip_add->Errors->Count());
        $errors = ($errors || $this->ip_update->Errors->Count());
        $errors = ($errors || $this->language_id->Errors->Count());
        $errors = ($errors || $this->image_url->Errors->Count());
        $errors = ($errors || $this->age_id->Errors->Count());
        $errors = ($errors || $this->gender_id->Errors->Count());
        $errors = ($errors || $this->education_id->Errors->Count());
        $errors = ($errors || $this->income_id->Errors->Count());
        $errors = ($errors || $this->user_SSN->Errors->Count());
        $errors = ($errors || $this->user_is_active->Errors->Count());
        $errors = ($errors || $this->user_password_Shadow->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @2-0BAF16D6
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = $this->DataSource->AllParametersSet;
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = $this->EditMode ? "Button_Update" : "Button_Insert";
            if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            } else if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            } else if($this->Button_Delete->Pressed) {
                $this->PressedButton = "Button_Delete";
            }
        }
        $Redirect = "users_list.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
                if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//InsertRow Method @2-DBD1C59D
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->user_login->SetValue($this->user_login->GetValue(true));
        $this->DataSource->first_name->SetValue($this->first_name->GetValue(true));
        $this->DataSource->last_name->SetValue($this->last_name->GetValue(true));
        $this->DataSource->title->SetValue($this->title->GetValue(true));
        $this->DataSource->group_id->SetValue($this->group_id->GetValue(true));
        $this->DataSource->phone_home->SetValue($this->phone_home->GetValue(true));
        $this->DataSource->phone_work->SetValue($this->phone_work->GetValue(true));
        $this->DataSource->phone_day->SetValue($this->phone_day->GetValue(true));
        $this->DataSource->phone_cell->SetValue($this->phone_cell->GetValue(true));
        $this->DataSource->phone_evening->SetValue($this->phone_evening->GetValue(true));
        $this->DataSource->fax->SetValue($this->fax->GetValue(true));
        $this->DataSource->email->SetValue($this->email->GetValue(true));
        $this->DataSource->notes->SetValue($this->notes->GetValue(true));
        $this->DataSource->card_number->SetValue($this->card_number->GetValue(true));
        $this->DataSource->card_expire_date->SetValue($this->card_expire_date->GetValue(true));
        $this->DataSource->country_id->SetValue($this->country_id->GetValue(true));
        $this->DataSource->state_id->SetValue($this->state_id->GetValue(true));
        $this->DataSource->city->SetValue($this->city->GetValue(true));
        $this->DataSource->zip->SetValue($this->zip->GetValue(true));
        $this->DataSource->address1->SetValue($this->address1->GetValue(true));
        $this->DataSource->address2->SetValue($this->address2->GetValue(true));
        $this->DataSource->address3->SetValue($this->address3->GetValue(true));
        $this->DataSource->date_add->SetValue($this->date_add->GetValue(true));
        $this->DataSource->date_last_login->SetValue($this->date_last_login->GetValue(true));
        $this->DataSource->ip_add->SetValue($this->ip_add->GetValue(true));
        $this->DataSource->ip_update->SetValue($this->ip_update->GetValue(true));
        $this->DataSource->language_id->SetValue($this->language_id->GetValue(true));
        $this->DataSource->image_url->SetValue($this->image_url->GetValue(true));
        $this->DataSource->age_id->SetValue($this->age_id->GetValue(true));
        $this->DataSource->gender_id->SetValue($this->gender_id->GetValue(true));
        $this->DataSource->education_id->SetValue($this->education_id->GetValue(true));
        $this->DataSource->income_id->SetValue($this->income_id->GetValue(true));
        $this->DataSource->user_SSN->SetValue($this->user_SSN->GetValue(true));
        $this->DataSource->user_is_active->SetValue($this->user_is_active->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @2-7B456067
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->user_login->SetValue($this->user_login->GetValue(true));
        $this->DataSource->first_name->SetValue($this->first_name->GetValue(true));
        $this->DataSource->last_name->SetValue($this->last_name->GetValue(true));
        $this->DataSource->title->SetValue($this->title->GetValue(true));
        $this->DataSource->group_id->SetValue($this->group_id->GetValue(true));
        $this->DataSource->phone_home->SetValue($this->phone_home->GetValue(true));
        $this->DataSource->phone_work->SetValue($this->phone_work->GetValue(true));
        $this->DataSource->phone_day->SetValue($this->phone_day->GetValue(true));
        $this->DataSource->phone_cell->SetValue($this->phone_cell->GetValue(true));
        $this->DataSource->phone_evening->SetValue($this->phone_evening->GetValue(true));
        $this->DataSource->fax->SetValue($this->fax->GetValue(true));
        $this->DataSource->email->SetValue($this->email->GetValue(true));
        $this->DataSource->notes->SetValue($this->notes->GetValue(true));
        $this->DataSource->card_number->SetValue($this->card_number->GetValue(true));
        $this->DataSource->card_expire_date->SetValue($this->card_expire_date->GetValue(true));
        $this->DataSource->country_id->SetValue($this->country_id->GetValue(true));
        $this->DataSource->state_id->SetValue($this->state_id->GetValue(true));
        $this->DataSource->city->SetValue($this->city->GetValue(true));
        $this->DataSource->zip->SetValue($this->zip->GetValue(true));
        $this->DataSource->address1->SetValue($this->address1->GetValue(true));
        $this->DataSource->address2->SetValue($this->address2->GetValue(true));
        $this->DataSource->address3->SetValue($this->address3->GetValue(true));
        $this->DataSource->date_add->SetValue($this->date_add->GetValue(true));
        $this->DataSource->date_last_login->SetValue($this->date_last_login->GetValue(true));
        $this->DataSource->ip_add->SetValue($this->ip_add->GetValue(true));
        $this->DataSource->ip_update->SetValue($this->ip_update->GetValue(true));
        $this->DataSource->language_id->SetValue($this->language_id->GetValue(true));
        $this->DataSource->image_url->SetValue($this->image_url->GetValue(true));
        $this->DataSource->age_id->SetValue($this->age_id->GetValue(true));
        $this->DataSource->gender_id->SetValue($this->gender_id->GetValue(true));
        $this->DataSource->education_id->SetValue($this->education_id->GetValue(true));
        $this->DataSource->income_id->SetValue($this->income_id->GetValue(true));
        $this->DataSource->user_SSN->SetValue($this->user_SSN->GetValue(true));
        $this->DataSource->user_is_active->SetValue($this->user_is_active->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @2-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @2-11E565E6
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
        if($this->EditMode) {
            if($this->DataSource->Errors->Count()){
                $this->Errors->AddErrors($this->DataSource->Errors);
                $this->DataSource->Errors->clear();
            }
            $this->DataSource->Open();
            if($this->DataSource->Errors->Count() == 0 && $this->DataSource->next_record()) {
                $this->DataSource->SetValues();
                if(!$this->FormSubmitted){
                    $this->user_login->SetValue($this->DataSource->user_login->GetValue());
                    $this->user_password->SetValue($this->DataSource->user_password->GetValue());
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
                    $this->notes->SetValue($this->DataSource->notes->GetValue());
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
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->user_login->Errors->ToString());
            $Error = ComposeStrings($Error, $this->user_password->Errors->ToString());
            $Error = ComposeStrings($Error, $this->first_name->Errors->ToString());
            $Error = ComposeStrings($Error, $this->last_name->Errors->ToString());
            $Error = ComposeStrings($Error, $this->title->Errors->ToString());
            $Error = ComposeStrings($Error, $this->group_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->phone_home->Errors->ToString());
            $Error = ComposeStrings($Error, $this->phone_work->Errors->ToString());
            $Error = ComposeStrings($Error, $this->phone_day->Errors->ToString());
            $Error = ComposeStrings($Error, $this->phone_cell->Errors->ToString());
            $Error = ComposeStrings($Error, $this->phone_evening->Errors->ToString());
            $Error = ComposeStrings($Error, $this->fax->Errors->ToString());
            $Error = ComposeStrings($Error, $this->email->Errors->ToString());
            $Error = ComposeStrings($Error, $this->notes->Errors->ToString());
            $Error = ComposeStrings($Error, $this->card_number->Errors->ToString());
            $Error = ComposeStrings($Error, $this->card_expire_date->Errors->ToString());
            $Error = ComposeStrings($Error, $this->country_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->state_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->city->Errors->ToString());
            $Error = ComposeStrings($Error, $this->zip->Errors->ToString());
            $Error = ComposeStrings($Error, $this->address1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->address2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->address3->Errors->ToString());
            $Error = ComposeStrings($Error, $this->date_add->Errors->ToString());
            $Error = ComposeStrings($Error, $this->date_last_login->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ip_add->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ip_update->Errors->ToString());
            $Error = ComposeStrings($Error, $this->language_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->image_url->Errors->ToString());
            $Error = ComposeStrings($Error, $this->age_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->gender_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->education_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->income_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->user_SSN->Errors->ToString());
            $Error = ComposeStrings($Error, $this->user_is_active->Errors->ToString());
            $Error = ComposeStrings($Error, $this->user_password_Shadow->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);
        $this->Button_Insert->Visible = !$this->EditMode && $this->InsertAllowed;
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_Delete->Visible = $this->EditMode && $this->DeleteAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->user_login->Show();
        $this->user_password->Show();
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
        $this->notes->Show();
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
        $this->user_password_Shadow->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End users Class @2-FCB6E20C

class clsusersDataSource extends clsDBmyproject {  //usersDataSource Class @2-450B5E7B

//DataSource Variables @2-96AA4593
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $InsertParameters;
    public $UpdateParameters;
    public $DeleteParameters;
    public $wp;
    public $AllParametersSet;

    public $InsertFields = array();
    public $UpdateFields = array();

    // Datasource fields
    public $user_login;
    public $user_password;
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
    public $notes;
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
    public $user_password_Shadow;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-A0CCA561
    function clsusersDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record users/Error";
        $this->Initialize();
        $this->user_login = new clsField("user_login", ccsText, "");
        
        $this->user_password = new clsField("user_password", ccsText, "");
        
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
        
        $this->notes = new clsField("notes", ccsMemo, "");
        
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
        
        $this->user_password_Shadow = new clsField("user_password_Shadow", ccsText, "");
        

        $this->InsertFields["user_login"] = array("Name" => "user_login", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["user_password"] = array("Name" => "user_password", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["first_name"] = array("Name" => "first_name", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["last_name"] = array("Name" => "last_name", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["title"] = array("Name" => "title", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["group_id"] = array("Name" => "group_id", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["phone_home"] = array("Name" => "phone_home", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["phone_work"] = array("Name" => "phone_work", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["phone_day"] = array("Name" => "phone_day", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["phone_cell"] = array("Name" => "phone_cell", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["phone_evening"] = array("Name" => "phone_evening", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["fax"] = array("Name" => "fax", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["email"] = array("Name" => "email", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["notes"] = array("Name" => "notes", "Value" => "", "DataType" => ccsMemo, "OmitIfEmpty" => 1);
        $this->InsertFields["card_number"] = array("Name" => "card_number", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["card_expire_date"] = array("Name" => "card_expire_date", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["country_id"] = array("Name" => "country_id", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["state_id"] = array("Name" => "state_id", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["city"] = array("Name" => "city", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["zip"] = array("Name" => "zip", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["address1"] = array("Name" => "address1", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["address2"] = array("Name" => "address2", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["address3"] = array("Name" => "address3", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["date_add"] = array("Name" => "date_add", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["date_last_login"] = array("Name" => "date_last_login", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["ip_add"] = array("Name" => "ip_add", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ip_update"] = array("Name" => "ip_update", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["language_id"] = array("Name" => "language_id", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["image_url"] = array("Name" => "image_url", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["age_id"] = array("Name" => "age_id", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["gender_id"] = array("Name" => "gender_id", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["education_id"] = array("Name" => "education_id", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["income_id"] = array("Name" => "income_id", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["user_SSN"] = array("Name" => "user_SSN", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["user_is_active"] = array("Name" => "user_is_active", "Value" => "", "DataType" => ccsBoolean, "OmitIfEmpty" => 1);
        $this->UpdateFields["user_login"] = array("Name" => "user_login", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["user_password"] = array("Name" => "user_password", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["first_name"] = array("Name" => "first_name", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["last_name"] = array("Name" => "last_name", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["title"] = array("Name" => "title", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["group_id"] = array("Name" => "group_id", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["phone_home"] = array("Name" => "phone_home", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["phone_work"] = array("Name" => "phone_work", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["phone_day"] = array("Name" => "phone_day", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["phone_cell"] = array("Name" => "phone_cell", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["phone_evening"] = array("Name" => "phone_evening", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["fax"] = array("Name" => "fax", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["email"] = array("Name" => "email", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["notes"] = array("Name" => "notes", "Value" => "", "DataType" => ccsMemo, "OmitIfEmpty" => 1);
        $this->UpdateFields["card_number"] = array("Name" => "card_number", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["card_expire_date"] = array("Name" => "card_expire_date", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["country_id"] = array("Name" => "country_id", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["state_id"] = array("Name" => "state_id", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["city"] = array("Name" => "city", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["zip"] = array("Name" => "zip", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["address1"] = array("Name" => "address1", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["address2"] = array("Name" => "address2", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["address3"] = array("Name" => "address3", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["date_add"] = array("Name" => "date_add", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["date_last_login"] = array("Name" => "date_last_login", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["ip_add"] = array("Name" => "ip_add", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ip_update"] = array("Name" => "ip_update", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["language_id"] = array("Name" => "language_id", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["image_url"] = array("Name" => "image_url", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["age_id"] = array("Name" => "age_id", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["gender_id"] = array("Name" => "gender_id", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["education_id"] = array("Name" => "education_id", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["income_id"] = array("Name" => "income_id", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["user_SSN"] = array("Name" => "user_SSN", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["user_is_active"] = array("Name" => "user_is_active", "Value" => "", "DataType" => ccsBoolean, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @2-B49E291C
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urluser_id", ccsInteger, "", "", $this->Parameters["urluser_id"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "user_id", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-B071412E
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM users {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-606022E9
    function SetValues()
    {
        $this->user_login->SetDBValue($this->f("user_login"));
        $this->user_password->SetDBValue($this->f("user_password"));
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
        $this->notes->SetDBValue($this->f("notes"));
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

//Insert Method @2-41ECD4F8
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["user_login"] = new clsSQLParameter("ctrluser_login", ccsText, "", "", $this->user_login->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["user_password"] = new clsSQLParameter("expr50", ccsText, "", "", "{password}", NULL, false, $this->ErrorBlock);
        $this->cp["first_name"] = new clsSQLParameter("ctrlfirst_name", ccsText, "", "", $this->first_name->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["last_name"] = new clsSQLParameter("ctrllast_name", ccsText, "", "", $this->last_name->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["title"] = new clsSQLParameter("ctrltitle", ccsText, "", "", $this->title->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["group_id"] = new clsSQLParameter("ctrlgroup_id", ccsInteger, "", "", $this->group_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["phone_home"] = new clsSQLParameter("ctrlphone_home", ccsText, "", "", $this->phone_home->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["phone_work"] = new clsSQLParameter("ctrlphone_work", ccsText, "", "", $this->phone_work->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["phone_day"] = new clsSQLParameter("ctrlphone_day", ccsText, "", "", $this->phone_day->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["phone_cell"] = new clsSQLParameter("ctrlphone_cell", ccsText, "", "", $this->phone_cell->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["phone_evening"] = new clsSQLParameter("ctrlphone_evening", ccsText, "", "", $this->phone_evening->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["fax"] = new clsSQLParameter("ctrlfax", ccsText, "", "", $this->fax->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["email"] = new clsSQLParameter("ctrlemail", ccsText, "", "", $this->email->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["notes"] = new clsSQLParameter("ctrlnotes", ccsMemo, "", "", $this->notes->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["card_number"] = new clsSQLParameter("ctrlcard_number", ccsText, "", "", $this->card_number->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["card_expire_date"] = new clsSQLParameter("ctrlcard_expire_date", ccsText, "", "", $this->card_expire_date->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["country_id"] = new clsSQLParameter("ctrlcountry_id", ccsInteger, "", "", $this->country_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["state_id"] = new clsSQLParameter("ctrlstate_id", ccsInteger, "", "", $this->state_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["city"] = new clsSQLParameter("ctrlcity", ccsText, "", "", $this->city->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["zip"] = new clsSQLParameter("ctrlzip", ccsText, "", "", $this->zip->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["address1"] = new clsSQLParameter("ctrladdress1", ccsText, "", "", $this->address1->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["address2"] = new clsSQLParameter("ctrladdress2", ccsText, "", "", $this->address2->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["address3"] = new clsSQLParameter("ctrladdress3", ccsText, "", "", $this->address3->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["date_add"] = new clsSQLParameter("ctrldate_add", ccsDate, array("ShortDate"), $this->DateFormat, $this->date_add->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["date_last_login"] = new clsSQLParameter("ctrldate_last_login", ccsDate, array("ShortDate"), $this->DateFormat, $this->date_last_login->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ip_add"] = new clsSQLParameter("ctrlip_add", ccsText, "", "", $this->ip_add->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ip_update"] = new clsSQLParameter("ctrlip_update", ccsText, "", "", $this->ip_update->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["language_id"] = new clsSQLParameter("ctrllanguage_id", ccsInteger, "", "", $this->language_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["image_url"] = new clsSQLParameter("ctrlimage_url", ccsText, "", "", $this->image_url->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["age_id"] = new clsSQLParameter("ctrlage_id", ccsInteger, "", "", $this->age_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["gender_id"] = new clsSQLParameter("ctrlgender_id", ccsInteger, "", "", $this->gender_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["education_id"] = new clsSQLParameter("ctrleducation_id", ccsInteger, "", "", $this->education_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["income_id"] = new clsSQLParameter("ctrlincome_id", ccsInteger, "", "", $this->income_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["user_SSN"] = new clsSQLParameter("ctrluser_SSN", ccsText, "", "", $this->user_SSN->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["user_is_active"] = new clsSQLParameter("ctrluser_is_active", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), $this->BooleanFormat, $this->user_is_active->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["user_login"]->GetValue()) and !strlen($this->cp["user_login"]->GetText()) and !is_bool($this->cp["user_login"]->GetValue())) 
            $this->cp["user_login"]->SetValue($this->user_login->GetValue(true));
        if (!is_null($this->cp["user_password"]->GetValue()) and !strlen($this->cp["user_password"]->GetText()) and !is_bool($this->cp["user_password"]->GetValue())) 
            $this->cp["user_password"]->SetValue("{password}");
        if (!is_null($this->cp["first_name"]->GetValue()) and !strlen($this->cp["first_name"]->GetText()) and !is_bool($this->cp["first_name"]->GetValue())) 
            $this->cp["first_name"]->SetValue($this->first_name->GetValue(true));
        if (!is_null($this->cp["last_name"]->GetValue()) and !strlen($this->cp["last_name"]->GetText()) and !is_bool($this->cp["last_name"]->GetValue())) 
            $this->cp["last_name"]->SetValue($this->last_name->GetValue(true));
        if (!is_null($this->cp["title"]->GetValue()) and !strlen($this->cp["title"]->GetText()) and !is_bool($this->cp["title"]->GetValue())) 
            $this->cp["title"]->SetValue($this->title->GetValue(true));
        if (!is_null($this->cp["group_id"]->GetValue()) and !strlen($this->cp["group_id"]->GetText()) and !is_bool($this->cp["group_id"]->GetValue())) 
            $this->cp["group_id"]->SetValue($this->group_id->GetValue(true));
        if (!is_null($this->cp["phone_home"]->GetValue()) and !strlen($this->cp["phone_home"]->GetText()) and !is_bool($this->cp["phone_home"]->GetValue())) 
            $this->cp["phone_home"]->SetValue($this->phone_home->GetValue(true));
        if (!is_null($this->cp["phone_work"]->GetValue()) and !strlen($this->cp["phone_work"]->GetText()) and !is_bool($this->cp["phone_work"]->GetValue())) 
            $this->cp["phone_work"]->SetValue($this->phone_work->GetValue(true));
        if (!is_null($this->cp["phone_day"]->GetValue()) and !strlen($this->cp["phone_day"]->GetText()) and !is_bool($this->cp["phone_day"]->GetValue())) 
            $this->cp["phone_day"]->SetValue($this->phone_day->GetValue(true));
        if (!is_null($this->cp["phone_cell"]->GetValue()) and !strlen($this->cp["phone_cell"]->GetText()) and !is_bool($this->cp["phone_cell"]->GetValue())) 
            $this->cp["phone_cell"]->SetValue($this->phone_cell->GetValue(true));
        if (!is_null($this->cp["phone_evening"]->GetValue()) and !strlen($this->cp["phone_evening"]->GetText()) and !is_bool($this->cp["phone_evening"]->GetValue())) 
            $this->cp["phone_evening"]->SetValue($this->phone_evening->GetValue(true));
        if (!is_null($this->cp["fax"]->GetValue()) and !strlen($this->cp["fax"]->GetText()) and !is_bool($this->cp["fax"]->GetValue())) 
            $this->cp["fax"]->SetValue($this->fax->GetValue(true));
        if (!is_null($this->cp["email"]->GetValue()) and !strlen($this->cp["email"]->GetText()) and !is_bool($this->cp["email"]->GetValue())) 
            $this->cp["email"]->SetValue($this->email->GetValue(true));
        if (!is_null($this->cp["notes"]->GetValue()) and !strlen($this->cp["notes"]->GetText()) and !is_bool($this->cp["notes"]->GetValue())) 
            $this->cp["notes"]->SetValue($this->notes->GetValue(true));
        if (!is_null($this->cp["card_number"]->GetValue()) and !strlen($this->cp["card_number"]->GetText()) and !is_bool($this->cp["card_number"]->GetValue())) 
            $this->cp["card_number"]->SetValue($this->card_number->GetValue(true));
        if (!is_null($this->cp["card_expire_date"]->GetValue()) and !strlen($this->cp["card_expire_date"]->GetText()) and !is_bool($this->cp["card_expire_date"]->GetValue())) 
            $this->cp["card_expire_date"]->SetValue($this->card_expire_date->GetValue(true));
        if (!is_null($this->cp["country_id"]->GetValue()) and !strlen($this->cp["country_id"]->GetText()) and !is_bool($this->cp["country_id"]->GetValue())) 
            $this->cp["country_id"]->SetValue($this->country_id->GetValue(true));
        if (!is_null($this->cp["state_id"]->GetValue()) and !strlen($this->cp["state_id"]->GetText()) and !is_bool($this->cp["state_id"]->GetValue())) 
            $this->cp["state_id"]->SetValue($this->state_id->GetValue(true));
        if (!is_null($this->cp["city"]->GetValue()) and !strlen($this->cp["city"]->GetText()) and !is_bool($this->cp["city"]->GetValue())) 
            $this->cp["city"]->SetValue($this->city->GetValue(true));
        if (!is_null($this->cp["zip"]->GetValue()) and !strlen($this->cp["zip"]->GetText()) and !is_bool($this->cp["zip"]->GetValue())) 
            $this->cp["zip"]->SetValue($this->zip->GetValue(true));
        if (!is_null($this->cp["address1"]->GetValue()) and !strlen($this->cp["address1"]->GetText()) and !is_bool($this->cp["address1"]->GetValue())) 
            $this->cp["address1"]->SetValue($this->address1->GetValue(true));
        if (!is_null($this->cp["address2"]->GetValue()) and !strlen($this->cp["address2"]->GetText()) and !is_bool($this->cp["address2"]->GetValue())) 
            $this->cp["address2"]->SetValue($this->address2->GetValue(true));
        if (!is_null($this->cp["address3"]->GetValue()) and !strlen($this->cp["address3"]->GetText()) and !is_bool($this->cp["address3"]->GetValue())) 
            $this->cp["address3"]->SetValue($this->address3->GetValue(true));
        if (!is_null($this->cp["date_add"]->GetValue()) and !strlen($this->cp["date_add"]->GetText()) and !is_bool($this->cp["date_add"]->GetValue())) 
            $this->cp["date_add"]->SetValue($this->date_add->GetValue(true));
        if (!is_null($this->cp["date_last_login"]->GetValue()) and !strlen($this->cp["date_last_login"]->GetText()) and !is_bool($this->cp["date_last_login"]->GetValue())) 
            $this->cp["date_last_login"]->SetValue($this->date_last_login->GetValue(true));
        if (!is_null($this->cp["ip_add"]->GetValue()) and !strlen($this->cp["ip_add"]->GetText()) and !is_bool($this->cp["ip_add"]->GetValue())) 
            $this->cp["ip_add"]->SetValue($this->ip_add->GetValue(true));
        if (!is_null($this->cp["ip_update"]->GetValue()) and !strlen($this->cp["ip_update"]->GetText()) and !is_bool($this->cp["ip_update"]->GetValue())) 
            $this->cp["ip_update"]->SetValue($this->ip_update->GetValue(true));
        if (!is_null($this->cp["language_id"]->GetValue()) and !strlen($this->cp["language_id"]->GetText()) and !is_bool($this->cp["language_id"]->GetValue())) 
            $this->cp["language_id"]->SetValue($this->language_id->GetValue(true));
        if (!is_null($this->cp["image_url"]->GetValue()) and !strlen($this->cp["image_url"]->GetText()) and !is_bool($this->cp["image_url"]->GetValue())) 
            $this->cp["image_url"]->SetValue($this->image_url->GetValue(true));
        if (!is_null($this->cp["age_id"]->GetValue()) and !strlen($this->cp["age_id"]->GetText()) and !is_bool($this->cp["age_id"]->GetValue())) 
            $this->cp["age_id"]->SetValue($this->age_id->GetValue(true));
        if (!is_null($this->cp["gender_id"]->GetValue()) and !strlen($this->cp["gender_id"]->GetText()) and !is_bool($this->cp["gender_id"]->GetValue())) 
            $this->cp["gender_id"]->SetValue($this->gender_id->GetValue(true));
        if (!is_null($this->cp["education_id"]->GetValue()) and !strlen($this->cp["education_id"]->GetText()) and !is_bool($this->cp["education_id"]->GetValue())) 
            $this->cp["education_id"]->SetValue($this->education_id->GetValue(true));
        if (!is_null($this->cp["income_id"]->GetValue()) and !strlen($this->cp["income_id"]->GetText()) and !is_bool($this->cp["income_id"]->GetValue())) 
            $this->cp["income_id"]->SetValue($this->income_id->GetValue(true));
        if (!is_null($this->cp["user_SSN"]->GetValue()) and !strlen($this->cp["user_SSN"]->GetText()) and !is_bool($this->cp["user_SSN"]->GetValue())) 
            $this->cp["user_SSN"]->SetValue($this->user_SSN->GetValue(true));
        if (!is_null($this->cp["user_is_active"]->GetValue()) and !strlen($this->cp["user_is_active"]->GetText()) and !is_bool($this->cp["user_is_active"]->GetValue())) 
            $this->cp["user_is_active"]->SetValue($this->user_is_active->GetValue(true));
        $this->InsertFields["user_login"]["Value"] = $this->cp["user_login"]->GetDBValue(true);
        $this->InsertFields["user_password"]["Value"] = $this->cp["user_password"]->GetDBValue(true);
        $this->InsertFields["first_name"]["Value"] = $this->cp["first_name"]->GetDBValue(true);
        $this->InsertFields["last_name"]["Value"] = $this->cp["last_name"]->GetDBValue(true);
        $this->InsertFields["title"]["Value"] = $this->cp["title"]->GetDBValue(true);
        $this->InsertFields["group_id"]["Value"] = $this->cp["group_id"]->GetDBValue(true);
        $this->InsertFields["phone_home"]["Value"] = $this->cp["phone_home"]->GetDBValue(true);
        $this->InsertFields["phone_work"]["Value"] = $this->cp["phone_work"]->GetDBValue(true);
        $this->InsertFields["phone_day"]["Value"] = $this->cp["phone_day"]->GetDBValue(true);
        $this->InsertFields["phone_cell"]["Value"] = $this->cp["phone_cell"]->GetDBValue(true);
        $this->InsertFields["phone_evening"]["Value"] = $this->cp["phone_evening"]->GetDBValue(true);
        $this->InsertFields["fax"]["Value"] = $this->cp["fax"]->GetDBValue(true);
        $this->InsertFields["email"]["Value"] = $this->cp["email"]->GetDBValue(true);
        $this->InsertFields["notes"]["Value"] = $this->cp["notes"]->GetDBValue(true);
        $this->InsertFields["card_number"]["Value"] = $this->cp["card_number"]->GetDBValue(true);
        $this->InsertFields["card_expire_date"]["Value"] = $this->cp["card_expire_date"]->GetDBValue(true);
        $this->InsertFields["country_id"]["Value"] = $this->cp["country_id"]->GetDBValue(true);
        $this->InsertFields["state_id"]["Value"] = $this->cp["state_id"]->GetDBValue(true);
        $this->InsertFields["city"]["Value"] = $this->cp["city"]->GetDBValue(true);
        $this->InsertFields["zip"]["Value"] = $this->cp["zip"]->GetDBValue(true);
        $this->InsertFields["address1"]["Value"] = $this->cp["address1"]->GetDBValue(true);
        $this->InsertFields["address2"]["Value"] = $this->cp["address2"]->GetDBValue(true);
        $this->InsertFields["address3"]["Value"] = $this->cp["address3"]->GetDBValue(true);
        $this->InsertFields["date_add"]["Value"] = $this->cp["date_add"]->GetDBValue(true);
        $this->InsertFields["date_last_login"]["Value"] = $this->cp["date_last_login"]->GetDBValue(true);
        $this->InsertFields["ip_add"]["Value"] = $this->cp["ip_add"]->GetDBValue(true);
        $this->InsertFields["ip_update"]["Value"] = $this->cp["ip_update"]->GetDBValue(true);
        $this->InsertFields["language_id"]["Value"] = $this->cp["language_id"]->GetDBValue(true);
        $this->InsertFields["image_url"]["Value"] = $this->cp["image_url"]->GetDBValue(true);
        $this->InsertFields["age_id"]["Value"] = $this->cp["age_id"]->GetDBValue(true);
        $this->InsertFields["gender_id"]["Value"] = $this->cp["gender_id"]->GetDBValue(true);
        $this->InsertFields["education_id"]["Value"] = $this->cp["education_id"]->GetDBValue(true);
        $this->InsertFields["income_id"]["Value"] = $this->cp["income_id"]->GetDBValue(true);
        $this->InsertFields["user_SSN"]["Value"] = $this->cp["user_SSN"]->GetDBValue(true);
        $this->InsertFields["user_is_active"]["Value"] = $this->cp["user_is_active"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("users", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @2-FC965C1B
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["user_login"] = new clsSQLParameter("ctrluser_login", ccsText, "", "", $this->user_login->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["user_password"] = new clsSQLParameter("expr86", ccsText, "", "", "{password}", NULL, false, $this->ErrorBlock);
        $this->cp["first_name"] = new clsSQLParameter("ctrlfirst_name", ccsText, "", "", $this->first_name->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["last_name"] = new clsSQLParameter("ctrllast_name", ccsText, "", "", $this->last_name->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["title"] = new clsSQLParameter("ctrltitle", ccsText, "", "", $this->title->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["group_id"] = new clsSQLParameter("ctrlgroup_id", ccsInteger, "", "", $this->group_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["phone_home"] = new clsSQLParameter("ctrlphone_home", ccsText, "", "", $this->phone_home->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["phone_work"] = new clsSQLParameter("ctrlphone_work", ccsText, "", "", $this->phone_work->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["phone_day"] = new clsSQLParameter("ctrlphone_day", ccsText, "", "", $this->phone_day->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["phone_cell"] = new clsSQLParameter("ctrlphone_cell", ccsText, "", "", $this->phone_cell->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["phone_evening"] = new clsSQLParameter("ctrlphone_evening", ccsText, "", "", $this->phone_evening->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["fax"] = new clsSQLParameter("ctrlfax", ccsText, "", "", $this->fax->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["email"] = new clsSQLParameter("ctrlemail", ccsText, "", "", $this->email->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["notes"] = new clsSQLParameter("ctrlnotes", ccsMemo, "", "", $this->notes->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["card_number"] = new clsSQLParameter("ctrlcard_number", ccsText, "", "", $this->card_number->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["card_expire_date"] = new clsSQLParameter("ctrlcard_expire_date", ccsText, "", "", $this->card_expire_date->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["country_id"] = new clsSQLParameter("ctrlcountry_id", ccsInteger, "", "", $this->country_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["state_id"] = new clsSQLParameter("ctrlstate_id", ccsInteger, "", "", $this->state_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["city"] = new clsSQLParameter("ctrlcity", ccsText, "", "", $this->city->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["zip"] = new clsSQLParameter("ctrlzip", ccsText, "", "", $this->zip->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["address1"] = new clsSQLParameter("ctrladdress1", ccsText, "", "", $this->address1->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["address2"] = new clsSQLParameter("ctrladdress2", ccsText, "", "", $this->address2->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["address3"] = new clsSQLParameter("ctrladdress3", ccsText, "", "", $this->address3->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["date_add"] = new clsSQLParameter("ctrldate_add", ccsDate, array("ShortDate"), $this->DateFormat, $this->date_add->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["date_last_login"] = new clsSQLParameter("ctrldate_last_login", ccsDate, array("ShortDate"), $this->DateFormat, $this->date_last_login->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ip_add"] = new clsSQLParameter("ctrlip_add", ccsText, "", "", $this->ip_add->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ip_update"] = new clsSQLParameter("ctrlip_update", ccsText, "", "", $this->ip_update->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["language_id"] = new clsSQLParameter("ctrllanguage_id", ccsInteger, "", "", $this->language_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["image_url"] = new clsSQLParameter("ctrlimage_url", ccsText, "", "", $this->image_url->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["age_id"] = new clsSQLParameter("ctrlage_id", ccsInteger, "", "", $this->age_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["gender_id"] = new clsSQLParameter("ctrlgender_id", ccsInteger, "", "", $this->gender_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["education_id"] = new clsSQLParameter("ctrleducation_id", ccsInteger, "", "", $this->education_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["income_id"] = new clsSQLParameter("ctrlincome_id", ccsInteger, "", "", $this->income_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["user_SSN"] = new clsSQLParameter("ctrluser_SSN", ccsText, "", "", $this->user_SSN->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["user_is_active"] = new clsSQLParameter("ctrluser_is_active", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), $this->BooleanFormat, $this->user_is_active->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urluser_id", ccsInteger, "", "", CCGetFromGet("user_id", NULL), NULL, false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["user_login"]->GetValue()) and !strlen($this->cp["user_login"]->GetText()) and !is_bool($this->cp["user_login"]->GetValue())) 
            $this->cp["user_login"]->SetValue($this->user_login->GetValue(true));
        if (!is_null($this->cp["user_password"]->GetValue()) and !strlen($this->cp["user_password"]->GetText()) and !is_bool($this->cp["user_password"]->GetValue())) 
            $this->cp["user_password"]->SetValue("{password}");
        if (!is_null($this->cp["first_name"]->GetValue()) and !strlen($this->cp["first_name"]->GetText()) and !is_bool($this->cp["first_name"]->GetValue())) 
            $this->cp["first_name"]->SetValue($this->first_name->GetValue(true));
        if (!is_null($this->cp["last_name"]->GetValue()) and !strlen($this->cp["last_name"]->GetText()) and !is_bool($this->cp["last_name"]->GetValue())) 
            $this->cp["last_name"]->SetValue($this->last_name->GetValue(true));
        if (!is_null($this->cp["title"]->GetValue()) and !strlen($this->cp["title"]->GetText()) and !is_bool($this->cp["title"]->GetValue())) 
            $this->cp["title"]->SetValue($this->title->GetValue(true));
        if (!is_null($this->cp["group_id"]->GetValue()) and !strlen($this->cp["group_id"]->GetText()) and !is_bool($this->cp["group_id"]->GetValue())) 
            $this->cp["group_id"]->SetValue($this->group_id->GetValue(true));
        if (!is_null($this->cp["phone_home"]->GetValue()) and !strlen($this->cp["phone_home"]->GetText()) and !is_bool($this->cp["phone_home"]->GetValue())) 
            $this->cp["phone_home"]->SetValue($this->phone_home->GetValue(true));
        if (!is_null($this->cp["phone_work"]->GetValue()) and !strlen($this->cp["phone_work"]->GetText()) and !is_bool($this->cp["phone_work"]->GetValue())) 
            $this->cp["phone_work"]->SetValue($this->phone_work->GetValue(true));
        if (!is_null($this->cp["phone_day"]->GetValue()) and !strlen($this->cp["phone_day"]->GetText()) and !is_bool($this->cp["phone_day"]->GetValue())) 
            $this->cp["phone_day"]->SetValue($this->phone_day->GetValue(true));
        if (!is_null($this->cp["phone_cell"]->GetValue()) and !strlen($this->cp["phone_cell"]->GetText()) and !is_bool($this->cp["phone_cell"]->GetValue())) 
            $this->cp["phone_cell"]->SetValue($this->phone_cell->GetValue(true));
        if (!is_null($this->cp["phone_evening"]->GetValue()) and !strlen($this->cp["phone_evening"]->GetText()) and !is_bool($this->cp["phone_evening"]->GetValue())) 
            $this->cp["phone_evening"]->SetValue($this->phone_evening->GetValue(true));
        if (!is_null($this->cp["fax"]->GetValue()) and !strlen($this->cp["fax"]->GetText()) and !is_bool($this->cp["fax"]->GetValue())) 
            $this->cp["fax"]->SetValue($this->fax->GetValue(true));
        if (!is_null($this->cp["email"]->GetValue()) and !strlen($this->cp["email"]->GetText()) and !is_bool($this->cp["email"]->GetValue())) 
            $this->cp["email"]->SetValue($this->email->GetValue(true));
        if (!is_null($this->cp["notes"]->GetValue()) and !strlen($this->cp["notes"]->GetText()) and !is_bool($this->cp["notes"]->GetValue())) 
            $this->cp["notes"]->SetValue($this->notes->GetValue(true));
        if (!is_null($this->cp["card_number"]->GetValue()) and !strlen($this->cp["card_number"]->GetText()) and !is_bool($this->cp["card_number"]->GetValue())) 
            $this->cp["card_number"]->SetValue($this->card_number->GetValue(true));
        if (!is_null($this->cp["card_expire_date"]->GetValue()) and !strlen($this->cp["card_expire_date"]->GetText()) and !is_bool($this->cp["card_expire_date"]->GetValue())) 
            $this->cp["card_expire_date"]->SetValue($this->card_expire_date->GetValue(true));
        if (!is_null($this->cp["country_id"]->GetValue()) and !strlen($this->cp["country_id"]->GetText()) and !is_bool($this->cp["country_id"]->GetValue())) 
            $this->cp["country_id"]->SetValue($this->country_id->GetValue(true));
        if (!is_null($this->cp["state_id"]->GetValue()) and !strlen($this->cp["state_id"]->GetText()) and !is_bool($this->cp["state_id"]->GetValue())) 
            $this->cp["state_id"]->SetValue($this->state_id->GetValue(true));
        if (!is_null($this->cp["city"]->GetValue()) and !strlen($this->cp["city"]->GetText()) and !is_bool($this->cp["city"]->GetValue())) 
            $this->cp["city"]->SetValue($this->city->GetValue(true));
        if (!is_null($this->cp["zip"]->GetValue()) and !strlen($this->cp["zip"]->GetText()) and !is_bool($this->cp["zip"]->GetValue())) 
            $this->cp["zip"]->SetValue($this->zip->GetValue(true));
        if (!is_null($this->cp["address1"]->GetValue()) and !strlen($this->cp["address1"]->GetText()) and !is_bool($this->cp["address1"]->GetValue())) 
            $this->cp["address1"]->SetValue($this->address1->GetValue(true));
        if (!is_null($this->cp["address2"]->GetValue()) and !strlen($this->cp["address2"]->GetText()) and !is_bool($this->cp["address2"]->GetValue())) 
            $this->cp["address2"]->SetValue($this->address2->GetValue(true));
        if (!is_null($this->cp["address3"]->GetValue()) and !strlen($this->cp["address3"]->GetText()) and !is_bool($this->cp["address3"]->GetValue())) 
            $this->cp["address3"]->SetValue($this->address3->GetValue(true));
        if (!is_null($this->cp["date_add"]->GetValue()) and !strlen($this->cp["date_add"]->GetText()) and !is_bool($this->cp["date_add"]->GetValue())) 
            $this->cp["date_add"]->SetValue($this->date_add->GetValue(true));
        if (!is_null($this->cp["date_last_login"]->GetValue()) and !strlen($this->cp["date_last_login"]->GetText()) and !is_bool($this->cp["date_last_login"]->GetValue())) 
            $this->cp["date_last_login"]->SetValue($this->date_last_login->GetValue(true));
        if (!is_null($this->cp["ip_add"]->GetValue()) and !strlen($this->cp["ip_add"]->GetText()) and !is_bool($this->cp["ip_add"]->GetValue())) 
            $this->cp["ip_add"]->SetValue($this->ip_add->GetValue(true));
        if (!is_null($this->cp["ip_update"]->GetValue()) and !strlen($this->cp["ip_update"]->GetText()) and !is_bool($this->cp["ip_update"]->GetValue())) 
            $this->cp["ip_update"]->SetValue($this->ip_update->GetValue(true));
        if (!is_null($this->cp["language_id"]->GetValue()) and !strlen($this->cp["language_id"]->GetText()) and !is_bool($this->cp["language_id"]->GetValue())) 
            $this->cp["language_id"]->SetValue($this->language_id->GetValue(true));
        if (!is_null($this->cp["image_url"]->GetValue()) and !strlen($this->cp["image_url"]->GetText()) and !is_bool($this->cp["image_url"]->GetValue())) 
            $this->cp["image_url"]->SetValue($this->image_url->GetValue(true));
        if (!is_null($this->cp["age_id"]->GetValue()) and !strlen($this->cp["age_id"]->GetText()) and !is_bool($this->cp["age_id"]->GetValue())) 
            $this->cp["age_id"]->SetValue($this->age_id->GetValue(true));
        if (!is_null($this->cp["gender_id"]->GetValue()) and !strlen($this->cp["gender_id"]->GetText()) and !is_bool($this->cp["gender_id"]->GetValue())) 
            $this->cp["gender_id"]->SetValue($this->gender_id->GetValue(true));
        if (!is_null($this->cp["education_id"]->GetValue()) and !strlen($this->cp["education_id"]->GetText()) and !is_bool($this->cp["education_id"]->GetValue())) 
            $this->cp["education_id"]->SetValue($this->education_id->GetValue(true));
        if (!is_null($this->cp["income_id"]->GetValue()) and !strlen($this->cp["income_id"]->GetText()) and !is_bool($this->cp["income_id"]->GetValue())) 
            $this->cp["income_id"]->SetValue($this->income_id->GetValue(true));
        if (!is_null($this->cp["user_SSN"]->GetValue()) and !strlen($this->cp["user_SSN"]->GetText()) and !is_bool($this->cp["user_SSN"]->GetValue())) 
            $this->cp["user_SSN"]->SetValue($this->user_SSN->GetValue(true));
        if (!is_null($this->cp["user_is_active"]->GetValue()) and !strlen($this->cp["user_is_active"]->GetText()) and !is_bool($this->cp["user_is_active"]->GetValue())) 
            $this->cp["user_is_active"]->SetValue($this->user_is_active->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "user_id", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsInteger),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["user_login"]["Value"] = $this->cp["user_login"]->GetDBValue(true);
        $this->UpdateFields["user_password"]["Value"] = $this->cp["user_password"]->GetDBValue(true);
        $this->UpdateFields["first_name"]["Value"] = $this->cp["first_name"]->GetDBValue(true);
        $this->UpdateFields["last_name"]["Value"] = $this->cp["last_name"]->GetDBValue(true);
        $this->UpdateFields["title"]["Value"] = $this->cp["title"]->GetDBValue(true);
        $this->UpdateFields["group_id"]["Value"] = $this->cp["group_id"]->GetDBValue(true);
        $this->UpdateFields["phone_home"]["Value"] = $this->cp["phone_home"]->GetDBValue(true);
        $this->UpdateFields["phone_work"]["Value"] = $this->cp["phone_work"]->GetDBValue(true);
        $this->UpdateFields["phone_day"]["Value"] = $this->cp["phone_day"]->GetDBValue(true);
        $this->UpdateFields["phone_cell"]["Value"] = $this->cp["phone_cell"]->GetDBValue(true);
        $this->UpdateFields["phone_evening"]["Value"] = $this->cp["phone_evening"]->GetDBValue(true);
        $this->UpdateFields["fax"]["Value"] = $this->cp["fax"]->GetDBValue(true);
        $this->UpdateFields["email"]["Value"] = $this->cp["email"]->GetDBValue(true);
        $this->UpdateFields["notes"]["Value"] = $this->cp["notes"]->GetDBValue(true);
        $this->UpdateFields["card_number"]["Value"] = $this->cp["card_number"]->GetDBValue(true);
        $this->UpdateFields["card_expire_date"]["Value"] = $this->cp["card_expire_date"]->GetDBValue(true);
        $this->UpdateFields["country_id"]["Value"] = $this->cp["country_id"]->GetDBValue(true);
        $this->UpdateFields["state_id"]["Value"] = $this->cp["state_id"]->GetDBValue(true);
        $this->UpdateFields["city"]["Value"] = $this->cp["city"]->GetDBValue(true);
        $this->UpdateFields["zip"]["Value"] = $this->cp["zip"]->GetDBValue(true);
        $this->UpdateFields["address1"]["Value"] = $this->cp["address1"]->GetDBValue(true);
        $this->UpdateFields["address2"]["Value"] = $this->cp["address2"]->GetDBValue(true);
        $this->UpdateFields["address3"]["Value"] = $this->cp["address3"]->GetDBValue(true);
        $this->UpdateFields["date_add"]["Value"] = $this->cp["date_add"]->GetDBValue(true);
        $this->UpdateFields["date_last_login"]["Value"] = $this->cp["date_last_login"]->GetDBValue(true);
        $this->UpdateFields["ip_add"]["Value"] = $this->cp["ip_add"]->GetDBValue(true);
        $this->UpdateFields["ip_update"]["Value"] = $this->cp["ip_update"]->GetDBValue(true);
        $this->UpdateFields["language_id"]["Value"] = $this->cp["language_id"]->GetDBValue(true);
        $this->UpdateFields["image_url"]["Value"] = $this->cp["image_url"]->GetDBValue(true);
        $this->UpdateFields["age_id"]["Value"] = $this->cp["age_id"]->GetDBValue(true);
        $this->UpdateFields["gender_id"]["Value"] = $this->cp["gender_id"]->GetDBValue(true);
        $this->UpdateFields["education_id"]["Value"] = $this->cp["education_id"]->GetDBValue(true);
        $this->UpdateFields["income_id"]["Value"] = $this->cp["income_id"]->GetDBValue(true);
        $this->UpdateFields["user_SSN"]["Value"] = $this->cp["user_SSN"]->GetDBValue(true);
        $this->UpdateFields["user_is_active"]["Value"] = $this->cp["user_is_active"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("users", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @2-4AB027F1
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM users";
        $this->SQL = CCBuildSQL($this->SQL, $this->Where, "");
        if (!strlen($this->Where) && $this->Errors->Count() == 0) 
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End usersDataSource Class @2-FCB6E20C

//Include Page implementation @126-07AA2166
include_once(RelativePath . "/MenuIncludablePage.php");
//End Include Page implementation

//Initialize Page @1-BDE25D72
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
$TemplateFileName = "users_maint.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|js/jquery/ui/jquery.ui.core.js|js/jquery/ui/jquery.ui.widget.js|js/jquery/ui/jquery.ui.datepicker.js|js/jquery/datepicker/ccs-date-timepicker.js|";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Include events file @1-0DBF7EF3
include_once("./users_maint_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-3840EC85
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
$users = new clsRecordusers("", $MainPage);
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
$MainPage->users = & $users;
$MainPage->Menu = & $Menu;
$MainPage->MenuIncludablePage = & $MenuIncludablePage;
$MainPage->Sidebar1 = & $Sidebar1;
$MainPage->HeaderSidebar = & $HeaderSidebar;
$Content->AddComponent("users", $users);
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

//Execute Components @1-2F60F97E
$MasterPage->Operations();
$MenuIncludablePage->Operations();
$users->Operation();
//End Execute Components

//Go to destination page @1-F9C538EA
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBmyproject->close();
    header("Location: " . $Redirect);
    unset($users);
    $MenuIncludablePage->Class_Terminate();
    unset($MenuIncludablePage);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-DD79437F
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
if(preg_match("/<\/body>/i", $main_block)) {
    $main_block = preg_replace("/<\/body>/i", implode(array("<center><font face=\"Arial\"><small>Ge&#110;", "er&#97;&#116;&#101;d <!-- CCS -->wi&#116;&#10", "4; <!-- SCC -->C&#111;&#100;&#101;&#67;h&#97;&", "#114;&#103;e <!-- SCC -->St&#117;&#100;i&#111;", ".</small></font></center>"), "") . "</body>", $main_block);
} else if(preg_match("/<\/html>/i", $main_block) && !preg_match("/<\/frameset>/i", $main_block)) {
    $main_block = preg_replace("/<\/html>/i", implode(array("<center><font face=\"Arial\"><small>Ge&#110;", "er&#97;&#116;&#101;d <!-- CCS -->wi&#116;&#10", "4; <!-- SCC -->C&#111;&#100;&#101;&#67;h&#97;&", "#114;&#103;e <!-- SCC -->St&#117;&#100;i&#111;", ".</small></font></center>"), "") . "</html>", $main_block);
} else if(!preg_match("/<\/frameset>/i", $main_block)) {
    $main_block .= implode(array("<center><font face=\"Arial\"><small>Ge&#110;", "er&#97;&#116;&#101;d <!-- CCS -->wi&#116;&#10", "4; <!-- SCC -->C&#111;&#100;&#101;&#67;h&#97;&", "#114;&#103;e <!-- SCC -->St&#117;&#100;i&#111;", ".</small></font></center>"), "");
}
$main_block = CCConvertEncoding($main_block, $FileEncoding, $CCSLocales->GetFormatInfo("Encoding"));
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-05277D29
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBmyproject->close();
unset($MasterPage);
unset($users);
$MenuIncludablePage->Class_Terminate();
unset($MenuIncludablePage);
unset($Tpl);
//End Unload Page


?>
