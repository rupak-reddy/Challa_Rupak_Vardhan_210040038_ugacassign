from django.db import models

# Create your models here.
class students_data(models.Model):
    name = models.CharField(max_length=255)
    roll = models.CharField(max_length=255)
    dept = models.CharField(max_length=255)
    hostel = models.CharField(max_length=255)

    def __str__(self):
        return self.name

