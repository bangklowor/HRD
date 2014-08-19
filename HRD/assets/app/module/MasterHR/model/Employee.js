Ext.define('HRIS.module.MasterHR.model.Employee',{
	extend 		: 'Ext.data.Model',
	fields 		: [
		{name : 'id', type : 'string'},
		{name : 'code', type : 'string'},
		{name : 'fname', type : 'string'},
		{name : 'lname', type : 'string'},
		{name : 'username', type : 'string'},
		{name : 'bod', type : 'date'},
		{name : 'bod_place', type : 'string'},
		{name : 'gender', type : 'string'},
		{name : 'marital_status', type : 'string'},
		{name : 'noc', type : 'string'},
		{name : 'religion', type : 'string'},
		{name : 'blood', type : 'string'},
		{name : 'address', type : 'string'},
		{name : 'id_country', type : 'string'},
		{name : 'name_country', type : 'string'},
		{name : 'id_province', type : 'string'},
		{name : 'name_province', type : 'string'},
		{name : 'id_region', type : 'string'},
		{name : 'id_religion', type : 'string'},
		{name : 'name_region', type : 'string'},
		{name : 'zip', type : 'string'},
		{name : 'photo', type : 'string'},
		{name : 'email1', type : 'string'},
		{name : 'email2', type : 'string'},
		{name : 'phone', type : 'string'},
		{name : 'mobile1', type : 'string'},
		{name : 'mobile2', type : 'string'},
		{name : 'hire', type : 'date'},
		{name : 'expired', type : 'date'},
		{name : 'bank_account', type : 'string'},
		{name : 'tax', type : 'string'},
		{name : 'id_company', type : 'string'},
		{name : 'id_bank', type : 'string'},
		{name : 'name_bank', type : 'string'},
		{name : 'id_department', type : 'string'},
		{name : 'name_department', type : 'string'},
		{name : 'id_education', type : 'string'},
		{name : 'id_jobtitle', type : 'string'},
		{name : 'name_jobtitle', type : 'string'},
		{name : 'id_jobstatus', type : 'string'},
		{name : 'name_jobstatus', type : 'string'},
		{name : 'supervisor', type : 'string'},
		{name : 'idcard_type', type : 'string'},
		{name : 'idcard_number', type : 'string'},
		{name : 'isactive', type : 'string'},
		{name : 'isovertime', type : 'string'},
		{name : 'isresign', type : 'string'},
	]	
});