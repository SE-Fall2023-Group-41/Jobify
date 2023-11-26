# python base image in the container from Docker Hub
FROM python:3

WORKDIR /app
# copy files to the /app folder in the container
COPY . .
COPY ./requirements.txt /requirements.txt
# set the working directory in the container to be /src

# install the packages from the Pipfile in the container
RUN pip install -r requirements.txt
RUN pip install six
RUN pip freeze
#RUN pipenv install --system --deploy --ignore-pipfile
RUN chmod -R 775 /app
ENV PORT=8000
EXPOSE 8000

# execute the command python main.py (in the WORKDIR) to start the app
CMD ["python", "scheduled_notifier.py"]