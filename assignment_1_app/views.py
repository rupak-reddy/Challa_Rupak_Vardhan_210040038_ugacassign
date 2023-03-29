from django.shortcuts import render


def index(request):
    return render(request, "assignment_1_app/index.html")
# Create your views here.
