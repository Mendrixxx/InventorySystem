/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package functionality;

/**
 *
 * @author KRcsa
 */
public class Archive {
        int year;
        double total;
        private String[] choices = new String[] {"IT","LABORATORY","OFFICE"};
        String classification;
       public Archive(int year, double total, int classification) {
           this.year = year;
           this.total = total;
           this.classification = choices[classification];
       }  
        public void setyear(int year) {
		this.year = year;
	}
	public void settotal(double total) {
		this.total = total;
	}
	
	public void setclass(int classification) {
		this.classification  = choices[classification];
	}
        public int getyear() {
		return year;
	}
	public double gettotal() {
		return total;
	}
	
	public String getclass() {
		return classification;
	}
	
}
