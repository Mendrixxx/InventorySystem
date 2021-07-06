package functionality;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;

public class Item {
	String name;
	String description;
	int propertyNum;
	int dateAq;
	int unitMeas;
	double unitVal;
	double totalVal;
	int quantPropCar;
	int quantPhyCou;
	String remarks;
	private String[] choices = new String[] {"laboratory","office","IT"};
	String classification;

	
	//single setting of variables
	public void setName(String name) {
		this.name = name;
	}
	
	public void setDescription(String description) {
		this.description  = description;
	}
	
	public void setPropertyNum(int propertyNum) {
		this.propertyNum = propertyNum;
	}
	
	public void setDateAq (int dateAq) {
		this.dateAq = dateAq;
	}
	
	public void setUnitMeas(int unitMeas) {
		this.unitMeas = unitMeas;
	}
	 
	public void setUnitVal(double unitVal) {
		this.unitVal= unitVal;
	}
	
	public void setTotalVal (double totalVal) {
		this.totalVal = totalVal;
	}
	
	public void setQuantPropCar(int quantPropCar) {
		this.quantPropCar = quantPropCar;
	}
	
	public void setQuantPhyCou(int quantPhyCou) {
		this.quantPhyCou = quantPhyCou;
	} 
	
	public void setRemarks(String remarks) {
		this.remarks = remarks;
	}
	
	public void setClassification(int clNum) {
		classification = choices[clNum];
	}
	
	
	//set all variables in one method 
	public void setAll(String na,String de,int pn,int da,int um,double uv,double tv,int qpcr,int qpcu,String re,int clNum){
		name = na;
		description = de;
		propertyNum = pn;
		dateAq = da;
		unitMeas = um;
		unitVal = uv;
		totalVal = tv;
		quantPropCar = qpcr;
		quantPhyCou = qpcu;
		remarks = re;
		classification = choices[clNum];
	}
	
	//get variables
	public String getName() {
		return name;
	}
	
	public String getDescription() {
		return description;
	}
	
	public int getPropertyNum() {
		return propertyNum;
	}
	
	public int getDateAq () {
		return dateAq;
	}
	
	public int getUnitMeas() {
		return unitMeas;
	}
	 
	public double getUnitVal() {
		return unitVal;
	}
	
	public double getTotalVal () {
		return totalVal;
	}
	
	public int getQuantPropCar() {
		return quantPropCar;
	}
	
	public int getQuantPhyCou() {
		return quantPhyCou;
	} 
	
	public String getRemarks() {
		return remarks;
	}
	
	public String getClassification() {
		return classification;
	}
	
	
	//insert to database 
	public void insert() {
		Connection conn = null; 
	    PreparedStatement ps = null;
	    
	    try{
	    	conn = dbconn.connect();
	        String sql = "INSERT INTO data(item_name,item_desc,property_num,date_aq,unit_meas,unit_val,total_val,quant_propcar,quant_phycou,remarks,classification) VALUES(?,?,?,?,?,?,?,?,?,?,?) ";
	        ps = conn.prepareStatement(sql);
	        ps.setString(1, name);
	        ps.setString(2, description);
	        ps.setInt(3, propertyNum);
	        ps.setInt(4, unitMeas);
	        ps.setDouble(5, unitVal);
	        ps.setDouble(6, totalVal);
	        ps.setInt(7, quantPropCar);
	        ps.setInt(8, quantPhyCou);
	        ps.setString(9, remarks);
	        ps.setString(10, classification);
	        ps.execute();
	       
	        System.out.println("Data has been inserted!");
	        
	    } catch(SQLException e){
	        System.out.println(e.toString());
	    }finally {
	    	if (conn != null) {
	    		try {
	    			conn.close();
	    		}catch(SQLException e) {}
	    	}
	    	if (ps != null) {
	    		try {
	    			ps.close();
	    		}catch(SQLException e){}
	    	}
	    }
	}
	
}
