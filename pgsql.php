alter table sales_orders drop constraint fk_coupon_order ;
alter table product_tags drop constraint fk_products_product_tags ;
alter table product_tags drop constraint fk_tags_product_tags ;
alter table user_roles drop constraint fk_roles_user_roles ;
alter table user_roles drop constraint fk_users_user_roles ;
alter table product_categories drop constraint fk_category_products_categories ;
alter table sales_orders drop constraint fk_user_sales_order ;
alter table sales_orders drop constraint fk_session_sales_order ;
alter table products drop constraint fk_product_statuses_product ;
alter table order_products drop constraint fk_sales_orders_order_products ;
alter table cc_transactions drop constraint fk_sales_order_cc_transaction ;
alter table product_categories drop constraint fk_product_product_category ;
alter table categories drop constraint fk_category_parent_category ;

-- get_permissions_drop 

-- get_view_drop

-- get_schema_drop
drop table users;
drop table roles;
drop table user_roles;
drop table categories;
drop table products;
drop table tags;
drop table sales_orders;
drop table coupons;
drop table product_tags;
drop table cc_transactions;
drop table sessions;
drop table product_statuses;
drop table product_categories;
drop table order_products;

-- get_smallpackage_pre_sql 

-- get_schema_create


CREATE TABLE users (
    id integer NOT NULL DEFAULT nextval('user_id_seq'::regclass) ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    username character varying(255)NOT NULL,
    auth_key character varying(32) NOT NULL,
    password_hash character varying(255) NOT NULL,
    password_reset_token character varying(255),
    email character varying(255) NOT NULL,
    status smallint NOT NULL DEFAULT 10,
    created_at integer NOT NULL,
    updated_at integer NOT NULL,
    verification_token character varying(255) ,
    CONSTRAINT user_pkey PRIMARY KEY (id),
    CONSTRAINT user_email_key UNIQUE (email),
    CONSTRAINT user_password_reset_token_key UNIQUE (password_reset_token),
    CONSTRAINT user_username_key UNIQUE (username)

)

INSERT INTO users VALUES (1	, 'admin', 1, 1, 1, 1, 'kurt_dc@mail.ru', 1, 1555754591, 1555754591, 2);

create table roles (
   id          serial                   not null,
   name        varchar(255)             not null,
   inserted_at timestamp with time zone not null,
   updated_at  timestamp with time zone not null,
   constraint pk_roles primary key (id)
);


create table categories (
   id          serial                   not null,
   name        varchar(255)             not null,
   parent_id   integer                          ,
   inserted_at timestamp with time zone not null,
   updated_at  timestamp with time zone not null,
   constraint pk_categories primary key (id)
);

create table products (
   id                serial                   not null      ,   
   name              varchar(255)             not null      ,
   description       text                                   ,
   weight integer                  not null      ,
   price     numeric                   default 0    ,   
   quantity          integer                   default 0    ,
   
   inserted_at       timestamp with time zone not null      ,
   updated_at        timestamp with time zone not null      ,
   constraint pk_products primary key (id)
)   ;




create table user_roles (
   user_id     integer                  not null,
   role_id     integer                  not null,
   inserted_at timestamp with time zone not null,
   updated_at  timestamp with time zone not null,
   constraint pk_user_roles primary key (user_id,role_id)
)   ;




create table tags (
   id          serial                   not null,
   name        varchar(255)             not null,
   inserted_at timestamp with time zone not null,
   updated_at  timestamp with time zone not null,
   constraint pk_tags primary key (id)
)   ;
create table sales_orders (
   id          serial                   not null,
   order_date  date                     not null,
   total       numeric                  not null,
   coupon_id   integer                          ,
   session_id  varchar(255)             not null,
   user_id     integer                  not null,
   inserted_at timestamp with time zone not null,
   updated_at  timestamp with time zone not null,
   constraint pk_sales_orders primary key (id)
)   ;
create table coupons (
   id          serial                   not null      ,
   code        varchar(255)             not null      ,
   description text                                   ,
   active      bool                      default true ,
   value       numeric                                ,
   multiple    bool                      default false,
   start_date  timestamp with time zone               ,
   end_date    timestamp with time zone               ,
   inserted_at timestamp with time zone not null      ,
   updated_at  timestamp with time zone not null      ,
   constraint pk_coupons primary key (id)
)   ;
create table product_tags (
   product_id  integer                  not null,
   tag_id      integer                  not null,
   inserted_at timestamp with time zone not null,
   updated_at  timestamp with time zone not null,
   constraint pk_product_tags primary key (product_id,tag_id)
)   ;
create table cc_transactions (
   id                 serial                   not null,
   code               varchar(255)                     ,
   order_id           integer                  not null,
   transdate          timestamp with time zone         ,
   processor          varchar(255)             not null,
   processor_trans_id varchar(255)             not null,
   amount             numeric                  not null,
   cc_num             varchar(255)                     ,
   cc_type            varchar(255)                     ,
   response           text                             ,
   inserted_at        timestamp with time zone not null,
   updated_at         timestamp with time zone not null,
   constraint pk_cc_transactions primary key (id)
)   ;
create table sessions (
   id          varchar(255)             not null,
   data        text                             ,
   inserted_at timestamp with time zone not null,
   updated_at  timestamp with time zone not null,
   constraint pk_sessions primary key (id)
)   ;
create table product_statuses (
   id          serial                   not null,
   name        varchar(255)             not null,
   inserted_at timestamp with time zone not null,
   updated_at  timestamp with time zone not null,
   constraint pk_product_statuses primary key (id)
)   ;
create table product_categories (
   category_id integer                  not null,
   product_id  integer                  not null,
   inserted_at timestamp with time zone not null,
   updated_at  timestamp with time zone not null,
   constraint pk_product_categories primary key (category_id,product_id)
)   ;
create table order_products (
   id          serial                   not null,
   order_id    integer                          ,
   sku         varchar(255)             not null,
   name        varchar(255)             not null,
   description text                             ,
   price       numeric                  not null,
   quantity    integer                  not null,
   subtotal    numeric                  not null,
   inserted_at timestamp with time zone not null,
   updated_at  timestamp with time zone not null,
   constraint pk_order_products primary key (id)
)   ;

-- get_view_create

-- get_permissions_create

-- get_inserts

-- get_smallpackage_post_sql

-- get_associations_create
alter table sales_orders add constraint fk_coupon_order 
    foreign key (coupon_id)
    references coupons (id) ;
    
alter table product_tags add constraint fk_products_product_tags 
    foreign key (product_id)
    references products (id) ;
    
alter table product_tags add constraint fk_tags_product_tags 
    foreign key (tag_id)
    references tags (id) ;
    
alter table user_roles add constraint fk_roles_user_roles 
    foreign key (role_id)
    references roles (id) ;
    
alter table user_roles add constraint fk_users_user_roles 
    foreign key (user_id)
    references users (id) ;
    
alter table product_categories add constraint fk_category_products_categories 
    foreign key (category_id)
    references categories (id) ;
    
alter table sales_orders add constraint fk_user_sales_order 
    foreign key (user_id)
    references users (id) ;
    
alter table sales_orders add constraint fk_session_sales_order 
    foreign key (session_id)
    references sessions (id) ;
    
alter table products add constraint fk_product_statuses_product 
    foreign key (product_status_id)
    references product_statuses (id) ;
    
alter table order_products add constraint fk_sales_orders_order_products 
    foreign key (order_id)
    references sales_orders (id) ;
    
alter table cc_transactions add constraint fk_sales_order_cc_transaction 
    foreign key (order_id)
    references sales_orders (id) ;
    
alter table product_categories add constraint fk_product_product_category 
    foreign key (product_id)
    references products (id) ;
    
alter table categories add constraint fk_category_parent_category 
    foreign key (parent_id)
    references categories (id) ;