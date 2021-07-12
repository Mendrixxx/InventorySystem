/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package functionality;

import java.time.LocalDate;

/**
 *
 * @author KRcsa
 */
public class Logs {
    String iname, action;
    LocalDate act_date;
     Logs(String inm, String act, LocalDate dact) {
    	this.iname = inm;
        this.action = act;
        this.act_date = dact;
    }
        
        public void setname(String inm) {
		this.iname = inm;
        }
	public void setact(String act) {
		this.action = act;
	}
	
	public void setdact(LocalDate dact) {
		this.act_date = dact;
	}
	
        public String getname() {
		return iname;
	}
    
	public String getact() {
		return action;
	}
	
	public LocalDate getdact() {
		return act_date;
	}
}
