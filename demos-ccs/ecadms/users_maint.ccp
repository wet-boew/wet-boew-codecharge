<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" masterPage="{CCS_PathToMasterPage}/MasterPage.ccp" useDesign="True" wizardTheme="None" needGeneration="0">
	<Components>
		<Panel id="121" visible="True" generateDiv="False" name="Head" contentPlaceholder="Head">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="122" visible="True" generateDiv="False" name="Content" contentPlaceholder="Content">
			<Components>
				<Record id="2" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="myproject" name="users" dataSource="users" errorSummator="Error" buttonsType="button" wizardRecordKey="user_id" wizardCaption="{res:users_RecordForm}" wizardFormMethod="post" wizardThemeApplyTo="Page" returnPage="users_list.ccp" PathID="Contentusers" customInsertType="Table" customInsert="users" customUpdateType="Table" customUpdate="users">
					<Components>
						<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="{res:CCS_Insert}" parentName="users" PathID="ContentusersButton_Insert">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="6" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="{res:CCS_Update}" parentName="users" PathID="ContentusersButton_Update">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="8" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="{res:CCS_Delete}" parentName="users" PathID="ContentusersButton_Delete">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="user_login" fieldSource="user_login" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:user_login}" caption="{res:user_login}" unique="False" wizardSize="20" wizardMaxLength="20" PathID="Contentusersuser_login">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="user_password" fieldSource="user_password" required="False" wizardIsPassword="True" parentName="users" wizardCaption="{res:user_password}" caption="{res:user_password}" unique="False" wizardSize="20" wizardMaxLength="20" PathID="Contentusersuser_password">
							<Components/>
							<Events>
								<Event name="OnValidate" type="Server">
									<Actions>
										<Action actionName="Reset Password Validation" actionCategory="Security" id="12" passwordControlName="user_password"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="first_name" fieldSource="first_name" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:first_name}" caption="{res:first_name}" unique="False" wizardSize="50" wizardMaxLength="50" PathID="Contentusersfirst_name">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="last_name" fieldSource="last_name" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:last_name}" caption="{res:last_name}" unique="False" wizardSize="50" wizardMaxLength="50" PathID="Contentuserslast_name">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="title" fieldSource="title" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:title}" caption="{res:title}" unique="False" wizardSize="50" wizardMaxLength="50" PathID="Contentuserstitle">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="group_id" fieldSource="group_id" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:group_id}" caption="{res:group_id}" unique="False" wizardSize="10" wizardMaxLength="10" PathID="Contentusersgroup_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="phone_home" fieldSource="phone_home" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:phone_home}" caption="{res:phone_home}" unique="False" wizardSize="50" wizardMaxLength="50" PathID="Contentusersphone_home">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="phone_work" fieldSource="phone_work" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:phone_work}" caption="{res:phone_work}" unique="False" wizardSize="50" wizardMaxLength="50" PathID="Contentusersphone_work">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="phone_day" fieldSource="phone_day" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:phone_day}" caption="{res:phone_day}" unique="False" wizardSize="20" wizardMaxLength="20" PathID="Contentusersphone_day">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="phone_cell" fieldSource="phone_cell" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:phone_cell}" caption="{res:phone_cell}" unique="False" wizardSize="50" wizardMaxLength="50" PathID="Contentusersphone_cell">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="phone_evening" fieldSource="phone_evening" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:phone_evening}" caption="{res:phone_evening}" unique="False" wizardSize="20" wizardMaxLength="20" PathID="Contentusersphone_evening">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="22" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="fax" fieldSource="fax" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:fax}" caption="{res:fax}" unique="False" wizardSize="20" wizardMaxLength="20" PathID="Contentusersfax">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="23" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="email" fieldSource="email" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:email}" caption="{res:email}" unique="False" wizardSize="50" wizardMaxLength="50" PathID="Contentusersemail">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextArea id="24" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="notes" fieldSource="notes" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:notes}" caption="{res:notes}" unique="False" wizardSize="50" wizardRows="3" PathID="Contentusersnotes">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextArea>
						<TextBox id="25" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="card_number" fieldSource="card_number" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:card_number}" caption="{res:card_number}" unique="False" wizardSize="50" wizardMaxLength="50" PathID="Contentuserscard_number">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="26" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="card_expire_date" fieldSource="card_expire_date" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:card_expire_date}" caption="{res:card_expire_date}" unique="False" wizardSize="10" wizardMaxLength="10" PathID="Contentuserscard_expire_date">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="27" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="country_id" fieldSource="country_id" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:country_id}" caption="{res:country_id}" unique="False" wizardSize="10" wizardMaxLength="10" PathID="Contentuserscountry_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="28" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="state_id" fieldSource="state_id" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:state_id}" caption="{res:state_id}" unique="False" wizardSize="10" wizardMaxLength="10" PathID="Contentusersstate_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="city" fieldSource="city" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:city}" caption="{res:city}" unique="False" wizardSize="30" wizardMaxLength="30" PathID="Contentuserscity">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="30" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="zip" fieldSource="zip" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:zip}" caption="{res:zip}" unique="False" wizardSize="10" wizardMaxLength="10" PathID="Contentuserszip">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="31" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="address1" fieldSource="address1" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:address1}" caption="{res:address1}" unique="False" wizardSize="50" wizardMaxLength="250" PathID="Contentusersaddress1">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="address2" fieldSource="address2" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:address2}" caption="{res:address2}" unique="False" wizardSize="50" wizardMaxLength="50" PathID="Contentusersaddress2">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="address3" fieldSource="address3" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:address3}" caption="{res:address3}" unique="False" wizardSize="50" wizardMaxLength="50" PathID="Contentusersaddress3">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="date_add" fieldSource="date_add" required="False" wizardIsPassword="False" parentName="users" features="(assigned)" wizardCaption="{res:date_add}" caption="{res:date_add}" format="ShortDate" unique="False" wizardSize="10" wizardMaxLength="100" PathID="Contentusersdate_add">
							<Components/>
							<Events/>
							<Attributes/>
							<Features>
								<JDateTimePicker id="35" show_weekend="True" name="InlineDatePicker1" category="jQuery" enabled="True">
									<Components/>
									<Events/>
									<TableParameters/>
									<SPParameters/>
									<SQLParameters/>
									<JoinTables/>
									<JoinLinks/>
									<Fields/>
									<Features/>
								</JDateTimePicker>
							</Features>
						</TextBox>
						<TextBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="date_last_login" fieldSource="date_last_login" required="False" wizardIsPassword="False" parentName="users" features="(assigned)" wizardCaption="{res:date_last_login}" caption="{res:date_last_login}" format="ShortDate" unique="False" wizardSize="10" wizardMaxLength="100" PathID="Contentusersdate_last_login">
							<Components/>
							<Events/>
							<Attributes/>
							<Features>
								<JDateTimePicker id="37" show_weekend="True" name="InlineDatePicker2" category="jQuery" enabled="True">
									<Components/>
									<Events/>
									<TableParameters/>
									<SPParameters/>
									<SQLParameters/>
									<JoinTables/>
									<JoinLinks/>
									<Fields/>
									<Features/>
								</JDateTimePicker>
							</Features>
						</TextBox>
						<TextBox id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ip_add" fieldSource="ip_add" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:ip_add}" caption="{res:ip_add}" unique="False" wizardSize="50" wizardMaxLength="50" PathID="Contentusersip_add">
							<Components/>

							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ip_update" fieldSource="ip_update" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:ip_update}" caption="{res:ip_update}" unique="False" wizardSize="50" wizardMaxLength="50" PathID="Contentusersip_update">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="language_id" fieldSource="language_id" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:language_id}" caption="{res:language_id}" unique="False" wizardSize="10" wizardMaxLength="10" PathID="Contentuserslanguage_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="image_url" fieldSource="image_url" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:image_url}" caption="{res:image_url}" unique="False" wizardSize="50" wizardMaxLength="64" PathID="Contentusersimage_url">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="age_id" fieldSource="age_id" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:age_id}" caption="{res:age_id}" unique="False" wizardSize="10" wizardMaxLength="10" PathID="Contentusersage_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="gender_id" fieldSource="gender_id" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:gender_id}" caption="{res:gender_id}" unique="False" wizardSize="10" wizardMaxLength="10" PathID="Contentusersgender_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="education_id" fieldSource="education_id" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:education_id}" caption="{res:education_id}" unique="False" wizardSize="10" wizardMaxLength="10" PathID="Contentuserseducation_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="income_id" fieldSource="income_id" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:income_id}" caption="{res:income_id}" unique="False" wizardSize="10" wizardMaxLength="10" PathID="Contentusersincome_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="user_SSN" fieldSource="user_SSN" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:user_SSN}" caption="{res:user_SSN}" unique="False" wizardSize="50" wizardMaxLength="50" PathID="Contentusersuser_SSN">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<CheckBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Boolean" name="user_is_active" fieldSource="user_is_active" required="False" wizardIsPassword="False" parentName="users" wizardCaption="{res:user_is_active}" PathID="Contentusersuser_is_active" defaultValue="Unchecked">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</CheckBox>
						<Hidden id="48" fieldSourceType="DBColumn" dataType="Text" name="user_password_Shadow" parentName="users" PathID="Contentusersuser_password_Shadow">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
					</Components>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Preserve Password" actionCategory="Security" id="3" passwordControlName="user_password" shadowControlName="user_password_Shadow"/>
							</Actions>
						</Event>
						<Event name="BeforeExecuteInsert" type="Server">
							<Actions>
								<Action actionName="Encrypt Password" actionCategory="Security" id="5" passwordControlName="user_password" shadowControlName="user_password_Shadow"/>
							</Actions>
						</Event>
						<Event name="BeforeExecuteUpdate" type="Server">
							<Actions>
								<Action actionName="Encrypt Password" actionCategory="Security" id="7" passwordControlName="user_password" shadowControlName="user_password_Shadow"/>
							</Actions>
						</Event>
					</Events>
					<TableParameters>
						<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="user_id" parameterSource="user_id" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<PKFields/>
					<ISPParameters/>
					<ISQLParameters/>
					<IFormElements>
						<CustomParameter id="49" field="user_login" dataType="Text" parameterType="Control" parameterSource="user_login" omitIfEmpty="True"/>
						<CustomParameter id="50" field="user_password" dataType="Text" parameterType="Expression" parameterSource="&quot;{password}&quot;" omitIfEmpty="True"/>
						<CustomParameter id="51" field="first_name" dataType="Text" parameterType="Control" parameterSource="first_name" omitIfEmpty="True"/>
						<CustomParameter id="52" field="last_name" dataType="Text" parameterType="Control" parameterSource="last_name" omitIfEmpty="True"/>
						<CustomParameter id="53" field="title" dataType="Text" parameterType="Control" parameterSource="title" omitIfEmpty="True"/>
						<CustomParameter id="54" field="group_id" dataType="Integer" parameterType="Control" parameterSource="group_id" omitIfEmpty="True"/>
						<CustomParameter id="55" field="phone_home" dataType="Text" parameterType="Control" parameterSource="phone_home" omitIfEmpty="True"/>
						<CustomParameter id="56" field="phone_work" dataType="Text" parameterType="Control" parameterSource="phone_work" omitIfEmpty="True"/>
						<CustomParameter id="57" field="phone_day" dataType="Text" parameterType="Control" parameterSource="phone_day" omitIfEmpty="True"/>
						<CustomParameter id="58" field="phone_cell" dataType="Text" parameterType="Control" parameterSource="phone_cell" omitIfEmpty="True"/>
						<CustomParameter id="59" field="phone_evening" dataType="Text" parameterType="Control" parameterSource="phone_evening" omitIfEmpty="True"/>
						<CustomParameter id="60" field="fax" dataType="Text" parameterType="Control" parameterSource="fax" omitIfEmpty="True"/>
						<CustomParameter id="61" field="email" dataType="Text" parameterType="Control" parameterSource="email" omitIfEmpty="True"/>
						<CustomParameter id="62" field="notes" dataType="Memo" parameterType="Control" parameterSource="notes" omitIfEmpty="True"/>
						<CustomParameter id="63" field="card_number" dataType="Text" parameterType="Control" parameterSource="card_number" omitIfEmpty="True"/>
						<CustomParameter id="64" field="card_expire_date" dataType="Text" parameterType="Control" parameterSource="card_expire_date" omitIfEmpty="True"/>
						<CustomParameter id="65" field="country_id" dataType="Integer" parameterType="Control" parameterSource="country_id" omitIfEmpty="True"/>
						<CustomParameter id="66" field="state_id" dataType="Integer" parameterType="Control" parameterSource="state_id" omitIfEmpty="True"/>
						<CustomParameter id="67" field="city" dataType="Text" parameterType="Control" parameterSource="city" omitIfEmpty="True"/>
						<CustomParameter id="68" field="zip" dataType="Text" parameterType="Control" parameterSource="zip" omitIfEmpty="True"/>
						<CustomParameter id="69" field="address1" dataType="Text" parameterType="Control" parameterSource="address1" omitIfEmpty="True"/>
						<CustomParameter id="70" field="address2" dataType="Text" parameterType="Control" parameterSource="address2" omitIfEmpty="True"/>
						<CustomParameter id="71" field="address3" dataType="Text" parameterType="Control" parameterSource="address3" omitIfEmpty="True"/>
						<CustomParameter id="72" field="date_add" dataType="Date" parameterType="Control" parameterSource="date_add" format="ShortDate" omitIfEmpty="True"/>
						<CustomParameter id="73" field="date_last_login" dataType="Date" parameterType="Control" parameterSource="date_last_login" format="ShortDate" omitIfEmpty="True"/>
						<CustomParameter id="74" field="ip_add" dataType="Text" parameterType="Control" parameterSource="ip_add" omitIfEmpty="True"/>
						<CustomParameter id="75" field="ip_update" dataType="Text" parameterType="Control" parameterSource="ip_update" omitIfEmpty="True"/>
						<CustomParameter id="76" field="language_id" dataType="Integer" parameterType="Control" parameterSource="language_id" omitIfEmpty="True"/>
						<CustomParameter id="77" field="image_url" dataType="Text" parameterType="Control" parameterSource="image_url" omitIfEmpty="True"/>
						<CustomParameter id="78" field="age_id" dataType="Integer" parameterType="Control" parameterSource="age_id" omitIfEmpty="True"/>
						<CustomParameter id="79" field="gender_id" dataType="Integer" parameterType="Control" parameterSource="gender_id" omitIfEmpty="True"/>
						<CustomParameter id="80" field="education_id" dataType="Integer" parameterType="Control" parameterSource="education_id" omitIfEmpty="True"/>
						<CustomParameter id="81" field="income_id" dataType="Integer" parameterType="Control" parameterSource="income_id" omitIfEmpty="True"/>
						<CustomParameter id="82" field="user_SSN" dataType="Text" parameterType="Control" parameterSource="user_SSN" omitIfEmpty="True"/>
						<CustomParameter id="83" field="user_is_active" dataType="Boolean" parameterType="Control" parameterSource="user_is_active" omitIfEmpty="True"/>
					</IFormElements>
					<USPParameters/>
					<USQLParameters/>
					<UConditions>
						<TableParameter id="84" conditionType="Parameter" useIsNull="False" field="user_id" dataType="Integer" parameterType="URL" parameterSource="user_id" searchConditionType="Equal" logicOperator="And" orderNumber="1" omitIfEmpty="True"/>
					</UConditions>
					<UFormElements>
						<CustomParameter id="85" field="user_login" dataType="Text" parameterType="Control" parameterSource="user_login" omitIfEmpty="True"/>
						<CustomParameter id="86" field="user_password" dataType="Text" parameterType="Expression" parameterSource="&quot;{password}&quot;" omitIfEmpty="True"/>
						<CustomParameter id="87" field="first_name" dataType="Text" parameterType="Control" parameterSource="first_name" omitIfEmpty="True"/>
						<CustomParameter id="88" field="last_name" dataType="Text" parameterType="Control" parameterSource="last_name" omitIfEmpty="True"/>
						<CustomParameter id="89" field="title" dataType="Text" parameterType="Control" parameterSource="title" omitIfEmpty="True"/>
						<CustomParameter id="90" field="group_id" dataType="Integer" parameterType="Control" parameterSource="group_id" omitIfEmpty="True"/>
						<CustomParameter id="91" field="phone_home" dataType="Text" parameterType="Control" parameterSource="phone_home" omitIfEmpty="True"/>
						<CustomParameter id="92" field="phone_work" dataType="Text" parameterType="Control" parameterSource="phone_work" omitIfEmpty="True"/>
						<CustomParameter id="93" field="phone_day" dataType="Text" parameterType="Control" parameterSource="phone_day" omitIfEmpty="True"/>
						<CustomParameter id="94" field="phone_cell" dataType="Text" parameterType="Control" parameterSource="phone_cell" omitIfEmpty="True"/>
						<CustomParameter id="95" field="phone_evening" dataType="Text" parameterType="Control" parameterSource="phone_evening" omitIfEmpty="True"/>
						<CustomParameter id="96" field="fax" dataType="Text" parameterType="Control" parameterSource="fax" omitIfEmpty="True"/>
						<CustomParameter id="97" field="email" dataType="Text" parameterType="Control" parameterSource="email" omitIfEmpty="True"/>
						<CustomParameter id="98" field="notes" dataType="Memo" parameterType="Control" parameterSource="notes" omitIfEmpty="True"/>
						<CustomParameter id="99" field="card_number" dataType="Text" parameterType="Control" parameterSource="card_number" omitIfEmpty="True"/>
						<CustomParameter id="100" field="card_expire_date" dataType="Text" parameterType="Control" parameterSource="card_expire_date" omitIfEmpty="True"/>
						<CustomParameter id="101" field="country_id" dataType="Integer" parameterType="Control" parameterSource="country_id" omitIfEmpty="True"/>
						<CustomParameter id="102" field="state_id" dataType="Integer" parameterType="Control" parameterSource="state_id" omitIfEmpty="True"/>
						<CustomParameter id="103" field="city" dataType="Text" parameterType="Control" parameterSource="city" omitIfEmpty="True"/>
						<CustomParameter id="104" field="zip" dataType="Text" parameterType="Control" parameterSource="zip" omitIfEmpty="True"/>
						<CustomParameter id="105" field="address1" dataType="Text" parameterType="Control" parameterSource="address1" omitIfEmpty="True"/>
						<CustomParameter id="106" field="address2" dataType="Text" parameterType="Control" parameterSource="address2" omitIfEmpty="True"/>
						<CustomParameter id="107" field="address3" dataType="Text" parameterType="Control" parameterSource="address3" omitIfEmpty="True"/>
						<CustomParameter id="108" field="date_add" dataType="Date" parameterType="Control" parameterSource="date_add" format="ShortDate" omitIfEmpty="True"/>
						<CustomParameter id="109" field="date_last_login" dataType="Date" parameterType="Control" parameterSource="date_last_login" format="ShortDate" omitIfEmpty="True"/>
						<CustomParameter id="110" field="ip_add" dataType="Text" parameterType="Control" parameterSource="ip_add" omitIfEmpty="True"/>
						<CustomParameter id="111" field="ip_update" dataType="Text" parameterType="Control" parameterSource="ip_update" omitIfEmpty="True"/>
						<CustomParameter id="112" field="language_id" dataType="Integer" parameterType="Control" parameterSource="language_id" omitIfEmpty="True"/>
						<CustomParameter id="113" field="image_url" dataType="Text" parameterType="Control" parameterSource="image_url" omitIfEmpty="True"/>
						<CustomParameter id="114" field="age_id" dataType="Integer" parameterType="Control" parameterSource="age_id" omitIfEmpty="True"/>
						<CustomParameter id="115" field="gender_id" dataType="Integer" parameterType="Control" parameterSource="gender_id" omitIfEmpty="True"/>
						<CustomParameter id="116" field="education_id" dataType="Integer" parameterType="Control" parameterSource="education_id" omitIfEmpty="True"/>
						<CustomParameter id="117" field="income_id" dataType="Integer" parameterType="Control" parameterSource="income_id" omitIfEmpty="True"/>
						<CustomParameter id="118" field="user_SSN" dataType="Text" parameterType="Control" parameterSource="user_SSN" omitIfEmpty="True"/>
						<CustomParameter id="119" field="user_is_active" dataType="Boolean" parameterType="Control" parameterSource="user_is_active" omitIfEmpty="True"/>
					</UFormElements>
					<DSPParameters/>
					<DSQLParameters/>
					<DConditions/>
					<SecurityGroups/>
					<Attributes/>
					<Features/>
				</Record>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="123" visible="True" generateDiv="False" name="Menu" contentPlaceholder="Menu">
			<Components>
				<IncludePage id="126" name="MenuIncludablePage" PathID="MenuMenuIncludablePage" parentType="Page" page="MenuIncludablePage.ccp">
					<Components/>
					<Events/>
					<Features/>
				</IncludePage>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="124" visible="True" generateDiv="False" name="Sidebar1" contentPlaceholder="Sidebar1">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="125" visible="True" generateDiv="False" name="HeaderSidebar" contentPlaceholder="HeaderSidebar">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="users_maint_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="users_maint.php" forShow="True" url="users_maint.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="120" groupID="10"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
