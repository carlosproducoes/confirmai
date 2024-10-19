# Database schema in dbdiagram.io

Table users{
  id integer
  first_name varchar(255)
  last_name varchar(255)
  email varchar(255)
  password varchar(255)
  created_at timestamp
  updated_at timestamp
}

Table events{
  id integer [pk]
  title varchar(255)
  date date
  time timestamp
  user_id integer
  created_at timestamp
  updated_at timestamp
}

Table guests{
  id integer [pk]
  name varchar(255)
  phone varchar(11)
  event_id integer
  created_at timestamp
  updated_at timestamp
}

Table invitations{
  id integer [pk]
  status enum('invited', 'confirmed', 'refused')
  guest_id integer
  created_at timestamp
  updated_at timestamp
}

Ref: events.user_id - users.id
Ref: guests.event_id - events.id
Ref: invitations.guest_id - guests.id