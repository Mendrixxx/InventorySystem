package functionality;

public class Component{
	int itemId;
	String itemName;
	String compName;
	int compUnitMeas;
	double compUnitValue;
	double compTotalValue;
	int compQuantPhyCou;
	
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
	
	public void setCompUnitMeas(int compUnitMeas) {
		this.compUnitMeas = compUnitMeas;
	}
	
	public void setCompUnitValue(double compUnitValue) {
		this.compUnitValue = compUnitValue;
	}
	
	public void setCompTotalValue(double compTotalValue) {
		this.compTotalValue = compTotalValue;
	}
	
	public void setcompQuantPhyCou(int compQuantPhyCou) {
		this.compQuantPhyCou = compQuantPhyCou;
	}
	
	//set all variables 
	public void setAllCompInfo(int ii,String cn,int cum, double cuv,double ctv,int cqpc) {
		itemId = ii;
		compName = cn;
		compUnitMeas = cum;
		compUnitValue = cuv;
		compTotalValue = ctv;
		compQuantPhyCou = cqpc;
	}
	public int getItemId() {
		return itemId;
	}
	
	public String getItemName() {
		return compName;
	}
	
	public String getCompName() {
		return compName;
	}
	
	public int getCompUnitMeas() {
		return compUnitMeas;
	}
	
	public double getCompUnitValue() {
		return compUnitValue;
	}
	
	public double getCompTotalValue() {
		return compTotalValue;
	}
	
	public int getcompQuantPhyCou() {
		return compQuantPhyCou;
	}
	
}
