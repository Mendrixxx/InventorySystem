package functionality;

public class Component{
	int itemId;
	String itemName;
	String compName;
	String compUnitMeas;
	double compUnitValue;
	double compTotalValue;
	int compQuantPhyCou;
	int compSOquan;
	double compSOval;
	
	//set single variables
	public void setItemId(int itemId) {
		this.itemId = itemId;
	}
	
	public void setItemName(String compName) {
		this.compName = compName;
	}
	
	public void setCompName(String compName) {
		this.compName = compName;
	}
	
	public void setCompUnitMeas(String compUnitMeas) {
		this.compUnitMeas = compUnitMeas;
	}
	
	public void setCompUnitValue(double compUnitValue) {
		this.compUnitValue = compUnitValue;
	}
	
	public void setCompTotalValue(double compTotalValue) {
		this.compTotalValue = compTotalValue;
	}
	
	public void setCompQuantPhyCou(int compQuantPhyCou) {
		this.compQuantPhyCou = compQuantPhyCou;
	}
	
	public void setCompSOquan(int compSOquan) {
		this.compSOquan =  compSOquan;
	}
	
	public void setCompSOval(double compSOval) {
		this.compSOval = compSOval;
	}
	
	//set all variables 
	public void setAllCompInfo(int ii,String cn,String cum, double cuv,double ctv,int cqpc,int csq,double csv) {
		itemId = ii;
		compName = cn;
		compUnitMeas = cum;
		compUnitValue = cuv;
		compTotalValue = ctv;
		compQuantPhyCou = cqpc;
		compSOquan = csq;
		compSOval = csv;
	}
	
	//get variables
	public int getItemId() {
		return itemId;
	}
	
	public String getItemName() {
		return compName;
	}
	
	public String getCompName() {
		return compName;
	}
	
	public String getCompUnitMeas() {
		return compUnitMeas;
	}
	
	public double getCompUnitValue() {
		return compUnitValue;
	}
	
	public double getCompTotalValue() {
		return compTotalValue;
	}
	
	public int getCompQuantPhyCou() {
		return compQuantPhyCou;
	}
	
	public int getCompSOquan() {
		return compSOquan;
	}
	
	public double getCompSOval() {
		return compSOquan;
	}
	
	
}
