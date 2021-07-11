package functionality;

public class Archive {
	int year;
	double total;
    private String[] choices = new String[] {"IT","LABORATORY","OFFICE"};
    String classification;
    
    Archive(int year, double total, int classification) {
    	this.year = year;
        this.total = total;
        this.classification = choices[classification];
    }
    
    public void setYear(int year) {
		this.year = year;
	}
    
	public void setTotal(double total) {
		this.total = total;
	}
	
	public void setClassification(int classification) {
		this.classification  = choices[classification];
	}
	
    public int getYear() {
		return year;
	}
    
	public double getTotal() {
		return total;
	}
	
	public String getClassification() {
		return classification;
	}
	
}
