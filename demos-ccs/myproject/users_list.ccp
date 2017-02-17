<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" masterPage="{CCS_PathToMasterPage}/MasterPage.ccp" useDesign="True" wizardTheme="None" needGeneration="0">
	<Components>
		<Panel id="162" visible="True" generateDiv="False" name="Head" contentPlaceholder="Head">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="163" visible="True" generateDiv="False" name="Content" contentPlaceholder="Content">
			<Components>
				<Panel id="2" visible="True" generateDiv="True" name="Panel1" PathID="ContentPanel1" features="(assigned)">
					<Components>
						<Record id="4" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="usersSearch" returnPage="users_list.ccp" wizardCaption="{res:Search_Form}" wizardOrientation="Vertical" wizardFormMethod="post" wizardTypeComponent="Search" PathID="ContentPanel1usersSearch" parentId="30">
							<Components>
								<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" parentName="usersSearch" PathID="ContentPanel1usersSearchButton_DoSearch">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Button>
								<TextBox id="8" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_last_name" wizardCaption="{res:last_name}" fieldSource="last_name" wizardIsPassword="False" parentName="usersSearch" caption="{res:last_name}" required="False" unique="False" wizardSize="50" wizardMaxLength="50" PathID="ContentPanel1usersSearchs_last_name">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
							</Components>
							<Events/>
							<TableParameters/>
							<SPParameters/>
							<SQLParameters/>
							<JoinTables/>
							<JoinLinks/>
							<Fields/>
							<PKFields/>
							<ISPParameters/>
							<ISQLParameters/>
							<IFormElements/>
							<USPParameters/>
							<USQLParameters/>
							<UConditions/>
							<UFormElements/>
							<DSPParameters/>
							<DSQLParameters/>
							<DConditions/>
							<SecurityGroups/>
							<Attributes/>
							<Features/>
						</Record>
						<Grid id="30" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="20" name="users" connection="myproject" pageSizeLimit="100" wizardCaption="{res:users_GridForm}" wizardGridType="Tabular" wizardAllowSorting="True" wizardSortingType="SimpleDir" wizardUsePageScroller="True" wizardAllowInsert="True" wizardAltRecord="False" wizardRecordSeparator="False" wizardAltRecordType="Controls" wizardUseSearch="True" childId="4" dataSource="users">
							<Components>
								<Link id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="users_Insert" hrefSource="users_maint.ccp" removeParameters="user_id" wizardThemeItem="NavigatorLink" wizardDefaultValue="{res:CCS_InsertLink}" parentName="users" PathID="ContentPanel1usersusers_Insert">
									<Components/>
									<Events/>
									<LinkParameters/>
									<Attributes/>
									<Features/>
								</Link>
								<Sorter id="56" visible="True" name="Sorter_user_id" column="user_id" wizardCaption="{res:user_id}" wizardSortingType="SimpleDir" wizardControl="user_id" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_user_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="58" visible="True" name="Sorter_first_name" column="first_name" wizardCaption="{res:first_name}" wizardSortingType="SimpleDir" wizardControl="first_name" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_first_name">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="59" visible="True" name="Sorter_last_name" column="last_name" wizardCaption="{res:last_name}" wizardSortingType="SimpleDir" wizardControl="last_name" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_last_name">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="62" visible="True" name="Sorter_phone_home" column="phone_home" wizardCaption="{res:phone_home}" wizardSortingType="SimpleDir" wizardControl="phone_home" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_phone_home">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="89" visible="True" name="Sorter_user_is_active" column="user_is_active" wizardCaption="{res:user_is_active}" wizardSortingType="SimpleDir" wizardControl="user_is_active" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_user_is_active">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Link id="91" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" preserveParameters="GET" name="user_id" fieldSource="user_id" wizardCaption="{res:user Id}" wizardIsPassword="False" parentName="users" rowNumber="1" wizardAlign="right" hrefSource="users_maint.ccp" PathID="ContentPanel1usersuser_id" urlType="Relative">
									<Components/>
									<Events/>
									<LinkParameters>
										<LinkParameter id="92" sourceType="DataField" format="yyyy-mm-dd" name="user_id" source="user_id"/>
									</LinkParameters>
									<Attributes/>
									<Features/>
								</Link>
								<Label id="96" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="first_name" fieldSource="first_name" wizardCaption="{res:first Name}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersfirst_name">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="98" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="last_name" fieldSource="last_name" wizardCaption="{res:last Name}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1userslast_name">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="104" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="phone_home" fieldSource="phone_home" wizardCaption="{res:phone Home}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersphone_home">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="158" fieldSourceType="DBColumn" dataType="Boolean" html="False" generateSpan="False" name="user_is_active" fieldSource="user_is_active" wizardCaption="{res:user Is Active}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersuser_is_active">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Navigator id="159" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="TextButtons" wizardFirst="True" wizardFirstText="|&amp;lt;" wizardPrev="True" wizardPrevText="&amp;lt;&amp;lt;" wizardNext="True" wizardNextText="&amp;gt;&amp;gt;" wizardLast="True" wizardLastText="&amp;gt;|" wizardPageNumbers="Simple" wizardTotalPages="False" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="True" wizardImagesScheme="Theme-gc-intranet">
									<Components/>
									<Events>
										<Event name="BeforeShow" type="Server">
											<Actions>
												<Action actionName="Hide-Show Component" actionCategory="General" id="160" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
											</Actions>
										</Event>
									</Events>
									<Attributes/>
									<Features/>
								</Navigator>
							</Components>
							<Events/>
							<TableParameters>
								<TableParameter id="33" conditionType="Parameter" useIsNull="False" field="user_login" parameterSource="s_user_login" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="1"/>
								<TableParameter id="34" conditionType="Parameter" useIsNull="False" field="first_name" parameterSource="s_first_name" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
								<TableParameter id="35" conditionType="Parameter" useIsNull="False" field="last_name" parameterSource="s_last_name" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="3"/>
								<TableParameter id="36" conditionType="Parameter" useIsNull="False" field="title" parameterSource="s_title" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="4"/>
								<TableParameter id="37" conditionType="Parameter" useIsNull="False" field="phone_home" parameterSource="s_phone_home" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="5"/>
								<TableParameter id="38" conditionType="Parameter" useIsNull="False" field="phone_work" parameterSource="s_phone_work" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="6"/>
								<TableParameter id="39" conditionType="Parameter" useIsNull="False" field="phone_day" parameterSource="s_phone_day" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="7"/>
								<TableParameter id="40" conditionType="Parameter" useIsNull="False" field="phone_cell" parameterSource="s_phone_cell" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="8"/>
								<TableParameter id="41" conditionType="Parameter" useIsNull="False" field="phone_evening" parameterSource="s_phone_evening" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="9"/>
								<TableParameter id="42" conditionType="Parameter" useIsNull="False" field="fax" parameterSource="s_fax" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="10"/>
								<TableParameter id="43" conditionType="Parameter" useIsNull="False" field="email" parameterSource="s_email" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="11"/>
								<TableParameter id="44" conditionType="Parameter" useIsNull="False" field="notes" parameterSource="s_notes" dataType="Memo" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="12"/>
								<TableParameter id="45" conditionType="Parameter" useIsNull="False" field="card_number" parameterSource="s_card_number" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="13"/>
								<TableParameter id="46" conditionType="Parameter" useIsNull="False" field="card_expire_date" parameterSource="s_card_expire_date" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="14"/>
								<TableParameter id="47" conditionType="Parameter" useIsNull="False" field="city" parameterSource="s_city" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="15"/>
								<TableParameter id="48" conditionType="Parameter" useIsNull="False" field="zip" parameterSource="s_zip" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="16"/>
								<TableParameter id="49" conditionType="Parameter" useIsNull="False" field="address1" parameterSource="s_address1" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="17"/>
								<TableParameter id="50" conditionType="Parameter" useIsNull="False" field="address2" parameterSource="s_address2" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="18"/>
								<TableParameter id="51" conditionType="Parameter" useIsNull="False" field="address3" parameterSource="s_address3" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="19"/>
								<TableParameter id="52" conditionType="Parameter" useIsNull="False" field="ip_add" parameterSource="s_ip_add" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="20"/>
								<TableParameter id="53" conditionType="Parameter" useIsNull="False" field="ip_update" parameterSource="s_ip_update" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="21"/>
								<TableParameter id="54" conditionType="Parameter" useIsNull="False" field="image_url" parameterSource="s_image_url" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="22"/>
								<TableParameter id="55" conditionType="Parameter" useIsNull="False" field="user_SSN" parameterSource="s_user_SSN" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="23"/>
							</TableParameters>
							<JoinTables>
								<JoinTable id="31" tableName="users" posWidth="-1" posHeight="-1" posLeft="-1" posRight="-1"/>
							</JoinTables>
							<JoinLinks/>
							<Fields>
								<Field id="90" tableName="users" fieldName="user_id"/>
								<Field id="93" tableName="users" fieldName="user_login"/>
								<Field id="95" tableName="users" fieldName="first_name"/>
								<Field id="97" tableName="users" fieldName="last_name"/>
								<Field id="99" tableName="users" fieldName="title"/>
								<Field id="101" tableName="users" fieldName="group_id"/>
								<Field id="103" tableName="users" fieldName="phone_home"/>
								<Field id="105" tableName="users" fieldName="phone_work"/>
								<Field id="107" tableName="users" fieldName="phone_day"/>
								<Field id="109" tableName="users" fieldName="phone_cell"/>
								<Field id="111" tableName="users" fieldName="phone_evening"/>
								<Field id="113" tableName="users" fieldName="fax"/>
								<Field id="115" tableName="users" fieldName="email"/>
								<Field id="117" tableName="users" fieldName="card_number"/>
								<Field id="119" tableName="users" fieldName="card_expire_date"/>
								<Field id="121" tableName="users" fieldName="country_id"/>
								<Field id="123" tableName="users" fieldName="state_id"/>
								<Field id="125" tableName="users" fieldName="city"/>
								<Field id="127" tableName="users" fieldName="zip"/>
								<Field id="129" tableName="users" fieldName="address1"/>
								<Field id="131" tableName="users" fieldName="address2"/>
								<Field id="133" tableName="users" fieldName="address3"/>
								<Field id="135" tableName="users" fieldName="date_add"/>
								<Field id="137" tableName="users" fieldName="date_last_login"/>
								<Field id="139" tableName="users" fieldName="ip_add"/>
								<Field id="141" tableName="users" fieldName="ip_update"/>
								<Field id="143" tableName="users" fieldName="language_id"/>
								<Field id="145" tableName="users" fieldName="image_url"/>
								<Field id="147" tableName="users" fieldName="age_id"/>
								<Field id="149" tableName="users" fieldName="gender_id"/>
								<Field id="151" tableName="users" fieldName="education_id"/>
								<Field id="153" tableName="users" fieldName="income_id"/>
								<Field id="155" tableName="users" fieldName="user_SSN"/>
								<Field id="157" tableName="users" fieldName="user_is_active"/>
							</Fields>
							<PKFields/>
							<SPParameters/>
							<SQLParameters/>
							<SecurityGroups/>
							<Attributes/>
							<Features/>
						</Grid>
					</Components>
					<Events/>
					<Attributes/>
					<Features>
						<JUpdatePanel id="3" enabled="True" childrenAsTriggers="True" name="UpdatePanel1" category="jQuery">
							<Components/>
							<Events/>
							<ControlPoints/>
							<Features/>
						</JUpdatePanel>
					</Features>
				</Panel>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="164" visible="True" generateDiv="False" name="Menu" contentPlaceholder="Menu">
			<Components>
				<IncludePage id="167" name="MenuIncludablePage" PathID="MenuMenuIncludablePage" parentType="Page" page="MenuIncludablePage.ccp">
					<Components/>
					<Events/>
					<Features/>
				</IncludePage>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="165" visible="True" generateDiv="False" name="Sidebar1" contentPlaceholder="Sidebar1">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="166" visible="True" generateDiv="False" name="HeaderSidebar" contentPlaceholder="HeaderSidebar">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="users_list_events.php" forShow="False" comment="//" codePage="utf-8"/>
		<CodeFile id="Code" language="PHPTemplates" name="users_list.php" forShow="True" url="users_list.php" comment="//" codePage="utf-8"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="168" groupID="1"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
