#include<iostream>
#include<string.h>
class Student{
	private:
		string stud_name,stud_id,department,area_of_interest,guide_name;
	public:
		Student(string stud_name="",string stud_id="",string department="",string area_of_interest="",string guide_name=""){
		this->stud_name=stud_name;
		this->stud_id=stud_id;
		this->department=department;
		this->area_of_interest=area_of_interest;
		this->guide_name=guide_name;		
	}
		int friend assignGuide();

};


class Professor{
	private:
		string prof_name,prof_id,department;
		string *areas_of_interest;
	public:
		Professor(string prof_name,string prof_id,string department,int n,string areas_of_interest[]){
		this->prof_name=prof_name;
		this->prof_id=prof_id;
		this->department=department;
		areas_of_interest=new string[n];
		for(int i=0;i<n;i++)
			this->areas_of_interest[i]=areas_of_interest[i];
		
	}

	int friend assignGuide();

};


void assignGuide(Professor *professor){

}
