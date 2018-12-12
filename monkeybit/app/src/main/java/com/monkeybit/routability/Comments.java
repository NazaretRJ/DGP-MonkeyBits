package com.monkeybit.routability;

import android.media.Image;

public class Comments {
    private String date;
    private String author;
    private String description;
    private String time;

    public Comments(String author, String description, String date, String time){
        this.date = date;
        this.author = author;
        this.description = description;
        this.time = time;
    }

    public String getDate() {
        return date;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public String getTime() { return time; }

    public void setTime(String time) { this.time = time; }

    public String getAuthor() {
        return author;
    }

    public void setAuthor(String author) {
        this.author = author;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }
}
