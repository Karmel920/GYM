create sequence users_id_seq
    as integer;

alter sequence users_id_seq owner to postgres;

create sequence meals_id_seq
    as integer;

alter sequence meals_id_seq owner to postgres;

create sequence users_parameters_id_seq
    as integer;

alter sequence users_parameters_id_seq owner to postgres;

create sequence users_macros_id_seq
    as integer;

alter sequence users_macros_id_seq owner to postgres;

create table if not exists users
(
    id_user  integer default nextval('users_id_seq'::regclass) not null
    primary key,
    email    varchar(255)                                      not null
    unique,
    password varchar(255)                                      not null,
    id_role  integer default 1                                 not null
    );

alter table users
    owner to postgres;

alter sequence users_id_seq owned by users.id_user;

create table if not exists meals
(
    id_meal  integer default nextval('meals_id_seq'::regclass) not null
    primary key,
    name     varchar(100)                                      not null
    unique,
    kcal     integer                                           not null,
    proteins integer                                           not null,
    fats     integer                                           not null,
    carbs    integer                                           not null
    );

alter table meals
    owner to postgres;

alter sequence meals_id_seq owned by meals.id_meal;

create table if not exists users_parameters
(
    id_user_parameters integer default nextval('users_parameters_id_seq'::regclass) not null
    primary key,
    sex                varchar(10),
    age                integer,
    height             integer,
    weight             integer,
    aim                varchar(10),
    id_user            integer                                                      not null
    unique
    constraint users_parameters_users_id_user_fk
    references users
    on update cascade on delete cascade
    );

alter table users_parameters
    owner to postgres;

alter sequence users_parameters_id_seq owned by users_parameters.id_user_parameters;

create table if not exists users_macros
(
    id_user_macros integer default nextval('users_macros_id_seq'::regclass) not null
    primary key,
    kcal           integer,
    proteins       integer,
    fats           integer,
    carbs          integer,
    id_user        integer                                                  not null
    unique
    constraint users_macros_users_id_user_fk
    references users
    on update cascade on delete cascade
    );

alter table users_macros
    owner to postgres;

alter sequence users_macros_id_seq owned by users_macros.id_user_macros;

create table if not exists days
(
    id_day  serial
    primary key,
    id_user integer not null
    constraint days_users_id_user_fk
    references users
    on update cascade on delete cascade,
    id_meal integer not null
    constraint days_meals_id_meal_fk
    references meals
    on update cascade on delete set null,
    date    date    not null
);

alter table days
    owner to postgres;

create table if not exists role
(
    id_role serial
    primary key,
    "user"  integer not null,
    admin   integer not null
);

alter table role
    owner to postgres;

create table if not exists sessions
(
    id_session  serial
    primary key,
    id_user     integer not null
    constraint sessions_users_id_user_fk
    references users
    on update cascade on delete cascade,
    login_time  timestamp,
    logout_time timestamp
);

alter table sessions
    owner to postgres;

create or replace view registered_users(email) as
SELECT users.email
FROM users
WHERE users.id_role = 1;

alter table registered_users
    owner to postgres;


insert into MY_TABLE (id_day, id_user, id_meal, date)
values  (2, 25, 2, '2023-01-16'),
        (3, 25, 3, '2023-01-16'),
        (4, 26, 4, '2023-01-16'),
        (5, 25, 5, '2023-01-17'),
        (9, 25, 5, '2023-01-16'),
        (10, 25, 7, '2023-01-16'),
        (11, 25, 5, '2023-01-19'),
        (12, 25, 3, '2023-01-19'),
        (13, 25, 2, '2023-01-19'),
        (14, 25, 4, '2023-01-19'),
        (15, 25, 5, '2023-01-21'),
        (16, 25, 3, '2023-01-21'),
        (17, 25, 2, '2023-01-21'),
        (18, 27, 3, '2023-01-21'),
        (19, 25, 3, '2023-01-27'),
        (20, 25, 5, '2023-01-27'),
        (21, 25, 3, '2023-01-18'),
        (22, 25, 3, '2023-01-17'),
        (23, 25, 4, '2023-01-17'),
        (24, 25, 3, '2023-01-17'),
        (25, 25, 5, '2023-01-18'),
        (26, 25, 4, '2023-01-18'),
        (27, 25, 70, '2023-01-17'),
        (28, 25, 5, '2023-01-17'),
        (29, 25, 5, '2023-01-20'),
        (30, 25, 3, '2023-01-20'),
        (31, 25, 71, '2023-01-20'),
        (32, 25, 5, '2023-01-20'),
        (33, 25, 3, '2023-03-15'),
        (34, 29, 5, '2023-01-20'),
        (35, 29, 4, '2023-01-20'),
        (36, 30, 5, '2023-01-21'),
        (37, 30, 3, '2023-01-21'),
        (38, 30, 74, '2023-01-21'),
        (39, 30, 75, '2023-01-21'),
        (40, 31, 3, '2023-01-24'),
        (41, 31, 76, '2023-01-24'),
        (42, 31, 5, '2023-01-24'),
        (43, 31, 69, '2023-01-24'),
        (44, 31, 3, '2023-01-25');

insert into MY_TABLE (id_meal, name, kcal, proteins, fats, carbs)
values  (2, 'owsianka(100g)', 500, 10, 3, 80),
        (3, 'banan', 200, 10, 5, 30),
        (4, 'spaghetti', 1200, 50, 20, 120),
        (5, 'skyr', 300, 20, 2, 20),
        (7, 'jajecznica(4 jajka)', 600, 50, 30, 70),
        (69, 'schabowy', 150, 30, 20, 5),
        (70, 'pizza', 1200, 30, 30, 100),
        (71, 'pecans(30g)', 210, 3, 22, 4),
        (72, 'kurczak z kasza', 900, 63, 6, 130),
        (73, 'owsianka na wodzie bez niczego taka dla konia', 1230, 100, 5, 250),
        (74, 'kluski z serem(250g)', 1173, 78, 14, 183),
        (75, 'Skyr 350g', 273, 23, 5, 33),
        (76, 'nutella(100g)', 550, 5, 20, 50);

insert into MY_TABLE (id_role, user, admin)
values  (1, 1, 0),
        (2, 0, 1);

insert into MY_TABLE (id_user, email, password, id_role)
values  (26, 'jasper69@gmail.com', 'c74b1b0fc233e8cc7226c82bced40d686ddd97e8', 1),
        (27, 'pokrywa12@prz.edu.pl', 'bd18b2e6583c4052d495408f247845f9f570ae8d', 1),
        (28, 'mpoweska@gmail.com', '0219fcbacad3451970f712ee13444bd455cb5fcc', 1),
        (29, 'kamil@o2.pl', '629bdf39e2728b58db060c348c5a8a9099842c1c', 1),
        (25, 'mp@pk.edu.pl', '15e075ebed4a69b0a1f2a603519c561c2d006fae', 2),
        (30, 'aniap@gmail.com', '8911cc1ff3c20695c98d8eada02ab413fd0632df', 1),
        (31, 'trolek@o2.pl', '3a6d989fd8ca7bd7d60a1bb33e27d8da2c0cda2d', 1);

insert into MY_TABLE (id_user_macros, kcal, proteins, fats, carbs, id_user)
values  (10, 2227, 112, 62, 307, 26),
        (11, 3431, 172, 96, 472, 27),
        (9, 3470, 174, 97, 478, 25),
        (12, null, null, null, null, 28),
        (13, 3821, 192, 107, 526, 29),
        (14, 2201, 111, 62, 303, 30),
        (15, 3670, 184, 102, 505, 31);

insert into MY_TABLE (id_user_parameters, sex, age, height, weight, aim, id_user)
values  (17, 'woman', 28, 165, 60, 'reduction', 26),
        (18, 'man', 22, 178, 68, 'mass', 27),
        (16, 'man', 21, 170, 72, 'mass', 25),
        (19, null, null, null, null, null, 28),
        (20, 'man', 25, 187, 82, 'mass', 29),
        (21, 'woman', 25, 160, 58, 'reduction', 30),
        (22, 'man', 21, 184, 75, 'mass', 31);
