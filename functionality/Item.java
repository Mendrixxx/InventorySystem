package functionality;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.time.LocalDate;
import java.util.*;

public class Item {
    int itemid;
    String name;
	String description;
	int propertyNum;
	LocalDate dateAq;
	String unitMeas;
	double unitVal;
	double totalVal;
	int quantPropCar;
	int quantPhyCou;
	String remarks;
	private String[] choices = new String[] {"IT","LABORATORY","OFFICE"};
	String classification;
	int SOquan;
	double SOval;
	List<Component> components = new LinkedList<Component>();
	
	Item(){}
	
	Item(int id, String na,String de,int pn,LocalDate da,String um,double uv,double tv,int qpcr,int qpcu,String re,int clNum,int soq,double soval) {
		itemid = id;
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
		SOquan = soq;
		SOval = soval;
    }
	
	//single setting of variables
    public void setid(int itemid) {
		this.itemid = itemid;
	}
	public void setName(String name) {
		this.name = name;
	}
	
	public void setDescription(String description) {
		this.description  = description;
	}
	
	public void setPropertyNum(int propertyNum) {
		this.propertyNum = propertyNum;
	}
	
	public void setDateAq (LocalDate dateAq) {
		this.dateAq = dateAq;
	}
	
	public void setUnitMeas(String unitMeas) {
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
	
	public void setSOquan(int SOquant) {
		this.SOquan = SOquant;
	}
	
	public void setSOval(double SOval) {
		this.SOval = SOval;
	}
	
	//set all variables in one method 
	public void setAll(int id, String na,String de,int pn,LocalDate da,String um,double uv,double tv,int qpcr,int qpcu,String re,int clNum){
		itemid = id;
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
	
	//add components
	public void addComponents(Component comp) {
		components.add(comp);
	}
	
	//get variables
        public int getid() {
		return itemid;
	}
	public String getName() {
		return name;
	}
	
	public String getDescription() {
		return description;
	}
	
	public int getPropertyNum() {
		return propertyNum;
	}
	
	public LocalDate getDateAq () {
		return dateAq;
	}
	
	public String getUnitMeas() {
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
	
	public int getSOquan(){
		return SOquan;
	}
	
	public double getSOval() {
		return SOval;
	}
	
	//get components
	public List<Component> getComponents() {
		return components;
	}
		
	//insert to database 
	public void insert() {
		Connection conn = null; 
	    PreparedStatement ps = null;
	    
	    try{
	    	conn = Dbconn.connect();
	        String sql = "INSERT INTO item(item_name,item_desc,property_num,date_aq,unit_meas,unit_val,total_val,quant_propcar,quant_phycou,remarks,classification,SO_quant,SO_val) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?) ";
	        ps = conn.prepareStatement(sql);
	        ps.setString(1, name);
	        ps.setString(2, description);
	        ps.setInt(3, propertyNum);
	        ps.setString(4, unitMeas);
	        ps.setDouble(5, unitVal);
	        ps.setDouble(6, totalVal);
	        ps.setInt(7, quantPropCar);
	        ps.setInt(8, quantPhyCou);
	        ps.setString(9, remarks);
	        ps.setString(10, classification);
	        ps.setInt(11, SOquan);
	        ps.setDouble(12, SOval);
	        ps.execute();
	        ps.close();
	        
	        if(!components.isEmpty()) {
	        	for(Component temp : components) {
	        		sql = "INSERT INTO component(item_id,comp_name,c_unit_meas,c_unit_val,c_total_val,c_quan_propcar,c_quan_phycou,c_SO_quan,c_SO_val)values(?,?,?,?,?,?,?,?,?)";
	        		ps = conn.prepareStatement(sql);
	        		ps.setInt(1, temp.getItemId());
	        		ps.setString(2, temp.getCompName());
	        		ps.setString(3,temp.getCompUnitMeas());
	        		ps.setDouble(4,temp.getCompUnitValue());
	        		ps.setDouble(5, temp.getCompTotalValue());
	        		ps.setInt(6,temp.getCompQuantPhyCou());
	        		ps.setInt(7,temp.getCompSOquan());
	        		ps.setDouble(8, temp.getCompSOval());
	        		
	        		ps.execute();
	        		ps.close();
	        	}
	        }
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