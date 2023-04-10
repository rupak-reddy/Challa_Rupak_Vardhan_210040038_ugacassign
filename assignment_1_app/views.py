from django.shortcuts import render, redirect
from django.contrib import messages
from .models import students_data
import json
def index(request):
    if request.method == "POST":
        name = request.POST["name"]
        roll = request.POST["roll"]
        dept = request.POST["dept"]
        hostel = request.POST["hostel"]
        y = roll
        if not students_data.objects.filter(roll = y):
            students_data.objects.create(name=name, roll=roll, dept=dept, hostel=hostel)
            message="Student Details added successfully..."
            messages.success(request, message)

        else:
            message="An error occured while adding the student details...There is already a student with existing roll number. If you want to find out who it is, please serach the roll number in the search box."
            messages.error(request, message)
        data = students_data.objects.all()
        return render(request, "assignment_1_app/index.html", {"data":data})
    else:
        file = open('assignment_1_app/data.json')
        file_data = json.load(file)
        for i in range(len(file_data)):
            name = file_data[i]["name"]
            roll = file_data[i]["roll"]
            dept = file_data[i]["dept"]
            hostel = file_data[i]["hostel"]
            x = roll
            if students_data.objects.filter(roll = x):
                continue
            message="Student Details added successfully..."
            messages.success(request, message)
            students_data.objects.create(name=name, roll=roll, dept=dept, hostel=hostel)
        data = students_data.objects.all()
        return render(request, "assignment_1_app/index.html", {"data":data})


def form(request):
        return render(request, "assignment_1_app/form.html")


def form2(request):
    if request.method == "POST":
        s = request.POST["roll"]
        modify_data = students_data.objects.filter(roll = s)
        modify_data.name = request.POST["name"]
    return render(request, "assignment_1_app/form2.html")
# Create your views here.
