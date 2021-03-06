PGDMP     9                
    w            con_desem_consultor_rel    10.9    10.9 ?    6           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            7           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            8           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            9           1262    84723    con_desem_consultor_rel    DATABASE     �   CREATE DATABASE con_desem_consultor_rel WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Bolivarian Republic of Venezuela.1252' LC_CTYPE = 'Spanish_Bolivarian Republic of Venezuela.1252';
 '   DROP DATABASE con_desem_consultor_rel;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            :           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    3                        3079    12924    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            ;           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    84812    CAO_CLIENTE    TABLE     �   CREATE TABLE public."CAO_CLIENTE" (
    co_cliente bigint NOT NULL,
    cliente_nombre character(20) NOT NULL,
    cliente_apellido character(20) NOT NULL
);
 !   DROP TABLE public."CAO_CLIENTE";
       public         postgres    false    3            �            1259    84796 
   CAO_FATURA    TABLE     �   CREATE TABLE public."CAO_FATURA" (
    co_factura bigint NOT NULL,
    co_cliente bigint NOT NULL,
    co_sistema bigint NOT NULL,
    co_os bigint NOT NULL,
    commissao_cn double precision NOT NULL
);
     DROP TABLE public."CAO_FATURA";
       public         postgres    false    3            �            1259    84794    CAO_FATURA_co_factura_seq    SEQUENCE     �   CREATE SEQUENCE public."CAO_FATURA_co_factura_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public."CAO_FATURA_co_factura_seq";
       public       postgres    false    203    3            <           0    0    CAO_FATURA_co_factura_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public."CAO_FATURA_co_factura_seq" OWNED BY public."CAO_FATURA".co_factura;
            public       postgres    false    202            �            1259    84804    CAO_OS    TABLE     �   CREATE TABLE public."CAO_OS" (
    co_os bigint NOT NULL,
    data_emissao date NOT NULL,
    valor double precision NOT NULL,
    total_imp_inc double precision NOT NULL
);
    DROP TABLE public."CAO_OS";
       public         postgres    false    3            �            1259    84802    CAO_OS_co_os_seq    SEQUENCE     {   CREATE SEQUENCE public."CAO_OS_co_os_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public."CAO_OS_co_os_seq";
       public       postgres    false    205    3            =           0    0    CAO_OS_co_os_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public."CAO_OS_co_os_seq" OWNED BY public."CAO_OS".co_os;
            public       postgres    false    204            �            1259    92917    CAO_SALARIO    TABLE     �   CREATE TABLE public."CAO_SALARIO" (
    co_salario bigint NOT NULL,
    co_sistema bigint NOT NULL,
    brut_salario double precision NOT NULL
);
 !   DROP TABLE public."CAO_SALARIO";
       public         postgres    false    3            �            1259    92915    CAO_SALARIO_co_salario_seq    SEQUENCE     �   CREATE SEQUENCE public."CAO_SALARIO_co_salario_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public."CAO_SALARIO_co_salario_seq";
       public       postgres    false    209    3            >           0    0    CAO_SALARIO_co_salario_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public."CAO_SALARIO_co_salario_seq" OWNED BY public."CAO_SALARIO".co_salario;
            public       postgres    false    208            �            1259    84778    CAO_USUARIO    TABLE     �   CREATE TABLE public."CAO_USUARIO" (
    co_usuario bigint NOT NULL,
    usuario_nombre character(20) NOT NULL,
    usuario_apellido character(20) NOT NULL
);
 !   DROP TABLE public."CAO_USUARIO";
       public         postgres    false    3            �            1259    84776    CO_USUARIO_co_usuario_seq    SEQUENCE     �   CREATE SEQUENCE public."CO_USUARIO_co_usuario_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public."CO_USUARIO_co_usuario_seq";
       public       postgres    false    201    3            ?           0    0    CO_USUARIO_co_usuario_seq    SEQUENCE OWNED BY     \   ALTER SEQUENCE public."CO_USUARIO_co_usuario_seq" OWNED BY public."CAO_USUARIO".co_usuario;
            public       postgres    false    200            �            1259    84762    PERMISSAO_SISTEMA    TABLE     �   CREATE TABLE public."PERMISSAO_SISTEMA" (
    co_sistema bigint NOT NULL,
    in_ativo character(1) NOT NULL,
    co_tipo_usuario bigint NOT NULL,
    co_usuario bigint NOT NULL
);
 '   DROP TABLE public."PERMISSAO_SISTEMA";
       public         postgres    false    3            �            1259    84760     PERMISSAO_SISTEMA_co_sistema_seq    SEQUENCE     �   CREATE SEQUENCE public."PERMISSAO_SISTEMA_co_sistema_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 9   DROP SEQUENCE public."PERMISSAO_SISTEMA_co_sistema_seq";
       public       postgres    false    197    3            @           0    0     PERMISSAO_SISTEMA_co_sistema_seq    SEQUENCE OWNED BY     i   ALTER SEQUENCE public."PERMISSAO_SISTEMA_co_sistema_seq" OWNED BY public."PERMISSAO_SISTEMA".co_sistema;
            public       postgres    false    196            �            1259    84770    TIPO_USUARIO    TABLE     }   CREATE TABLE public."TIPO_USUARIO" (
    co_tipo_usuario bigint NOT NULL,
    tipo_usuario character varying(20) NOT NULL
);
 "   DROP TABLE public."TIPO_USUARIO";
       public         postgres    false    3            �            1259    84768     TIPO_USUARIO_co_tipo_usuario_seq    SEQUENCE     �   CREATE SEQUENCE public."TIPO_USUARIO_co_tipo_usuario_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 9   DROP SEQUENCE public."TIPO_USUARIO_co_tipo_usuario_seq";
       public       postgres    false    3    199            A           0    0     TIPO_USUARIO_co_tipo_usuario_seq    SEQUENCE OWNED BY     i   ALTER SEQUENCE public."TIPO_USUARIO_co_tipo_usuario_seq" OWNED BY public."TIPO_USUARIO".co_tipo_usuario;
            public       postgres    false    198            �            1259    84810    cao_cliente_co_cliente_seq    SEQUENCE     �   CREATE SEQUENCE public.cao_cliente_co_cliente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.cao_cliente_co_cliente_seq;
       public       postgres    false    207    3            B           0    0    cao_cliente_co_cliente_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.cao_cliente_co_cliente_seq OWNED BY public."CAO_CLIENTE".co_cliente;
            public       postgres    false    206            �
           2604    84815    CAO_CLIENTE co_cliente    DEFAULT     �   ALTER TABLE ONLY public."CAO_CLIENTE" ALTER COLUMN co_cliente SET DEFAULT nextval('public.cao_cliente_co_cliente_seq'::regclass);
 G   ALTER TABLE public."CAO_CLIENTE" ALTER COLUMN co_cliente DROP DEFAULT;
       public       postgres    false    206    207    207            �
           2604    84799    CAO_FATURA co_factura    DEFAULT     �   ALTER TABLE ONLY public."CAO_FATURA" ALTER COLUMN co_factura SET DEFAULT nextval('public."CAO_FATURA_co_factura_seq"'::regclass);
 F   ALTER TABLE public."CAO_FATURA" ALTER COLUMN co_factura DROP DEFAULT;
       public       postgres    false    203    202    203            �
           2604    84807    CAO_OS co_os    DEFAULT     p   ALTER TABLE ONLY public."CAO_OS" ALTER COLUMN co_os SET DEFAULT nextval('public."CAO_OS_co_os_seq"'::regclass);
 =   ALTER TABLE public."CAO_OS" ALTER COLUMN co_os DROP DEFAULT;
       public       postgres    false    204    205    205            �
           2604    92920    CAO_SALARIO co_salario    DEFAULT     �   ALTER TABLE ONLY public."CAO_SALARIO" ALTER COLUMN co_salario SET DEFAULT nextval('public."CAO_SALARIO_co_salario_seq"'::regclass);
 G   ALTER TABLE public."CAO_SALARIO" ALTER COLUMN co_salario DROP DEFAULT;
       public       postgres    false    208    209    209            �
           2604    84781    CAO_USUARIO co_usuario    DEFAULT     �   ALTER TABLE ONLY public."CAO_USUARIO" ALTER COLUMN co_usuario SET DEFAULT nextval('public."CO_USUARIO_co_usuario_seq"'::regclass);
 G   ALTER TABLE public."CAO_USUARIO" ALTER COLUMN co_usuario DROP DEFAULT;
       public       postgres    false    200    201    201            �
           2604    84765    PERMISSAO_SISTEMA co_sistema    DEFAULT     �   ALTER TABLE ONLY public."PERMISSAO_SISTEMA" ALTER COLUMN co_sistema SET DEFAULT nextval('public."PERMISSAO_SISTEMA_co_sistema_seq"'::regclass);
 M   ALTER TABLE public."PERMISSAO_SISTEMA" ALTER COLUMN co_sistema DROP DEFAULT;
       public       postgres    false    196    197    197            �
           2604    84773    TIPO_USUARIO co_tipo_usuario    DEFAULT     �   ALTER TABLE ONLY public."TIPO_USUARIO" ALTER COLUMN co_tipo_usuario SET DEFAULT nextval('public."TIPO_USUARIO_co_tipo_usuario_seq"'::regclass);
 M   ALTER TABLE public."TIPO_USUARIO" ALTER COLUMN co_tipo_usuario DROP DEFAULT;
       public       postgres    false    198    199    199            1          0    84812    CAO_CLIENTE 
   TABLE DATA               U   COPY public."CAO_CLIENTE" (co_cliente, cliente_nombre, cliente_apellido) FROM stdin;
    public       postgres    false    207   }I       -          0    84796 
   CAO_FATURA 
   TABLE DATA               _   COPY public."CAO_FATURA" (co_factura, co_cliente, co_sistema, co_os, commissao_cn) FROM stdin;
    public       postgres    false    203   �I       /          0    84804    CAO_OS 
   TABLE DATA               M   COPY public."CAO_OS" (co_os, data_emissao, valor, total_imp_inc) FROM stdin;
    public       postgres    false    205   �I       3          0    92917    CAO_SALARIO 
   TABLE DATA               M   COPY public."CAO_SALARIO" (co_salario, co_sistema, brut_salario) FROM stdin;
    public       postgres    false    209   <J       +          0    84778    CAO_USUARIO 
   TABLE DATA               U   COPY public."CAO_USUARIO" (co_usuario, usuario_nombre, usuario_apellido) FROM stdin;
    public       postgres    false    201   hJ       '          0    84762    PERMISSAO_SISTEMA 
   TABLE DATA               `   COPY public."PERMISSAO_SISTEMA" (co_sistema, in_ativo, co_tipo_usuario, co_usuario) FROM stdin;
    public       postgres    false    197   �J       )          0    84770    TIPO_USUARIO 
   TABLE DATA               G   COPY public."TIPO_USUARIO" (co_tipo_usuario, tipo_usuario) FROM stdin;
    public       postgres    false    199   "K       C           0    0    CAO_FATURA_co_factura_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public."CAO_FATURA_co_factura_seq"', 5, true);
            public       postgres    false    202            D           0    0    CAO_OS_co_os_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public."CAO_OS_co_os_seq"', 5, true);
            public       postgres    false    204            E           0    0    CAO_SALARIO_co_salario_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public."CAO_SALARIO_co_salario_seq"', 3, true);
            public       postgres    false    208            F           0    0    CO_USUARIO_co_usuario_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public."CO_USUARIO_co_usuario_seq"', 5, true);
            public       postgres    false    200            G           0    0     PERMISSAO_SISTEMA_co_sistema_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public."PERMISSAO_SISTEMA_co_sistema_seq"', 5, true);
            public       postgres    false    196            H           0    0     TIPO_USUARIO_co_tipo_usuario_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public."TIPO_USUARIO_co_tipo_usuario_seq"', 3, true);
            public       postgres    false    198            I           0    0    cao_cliente_co_cliente_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.cao_cliente_co_cliente_seq', 1, true);
            public       postgres    false    206            �
           2606    84801    CAO_FATURA CAO_FATURA_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public."CAO_FATURA"
    ADD CONSTRAINT "CAO_FATURA_pkey" PRIMARY KEY (co_factura);
 H   ALTER TABLE ONLY public."CAO_FATURA" DROP CONSTRAINT "CAO_FATURA_pkey";
       public         postgres    false    203            �
           2606    84809    CAO_OS CAO_OS_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public."CAO_OS"
    ADD CONSTRAINT "CAO_OS_pkey" PRIMARY KEY (co_os);
 @   ALTER TABLE ONLY public."CAO_OS" DROP CONSTRAINT "CAO_OS_pkey";
       public         postgres    false    205            �
           2606    92922    CAO_SALARIO CAO_SALARIO_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public."CAO_SALARIO"
    ADD CONSTRAINT "CAO_SALARIO_pkey" PRIMARY KEY (co_salario);
 J   ALTER TABLE ONLY public."CAO_SALARIO" DROP CONSTRAINT "CAO_SALARIO_pkey";
       public         postgres    false    209            �
           2606    84783    CAO_USUARIO CO_USUARIO_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public."CAO_USUARIO"
    ADD CONSTRAINT "CO_USUARIO_pkey" PRIMARY KEY (co_usuario);
 I   ALTER TABLE ONLY public."CAO_USUARIO" DROP CONSTRAINT "CO_USUARIO_pkey";
       public         postgres    false    201            �
           2606    84767 (   PERMISSAO_SISTEMA PERMISSAO_SISTEMA_pkey 
   CONSTRAINT     r   ALTER TABLE ONLY public."PERMISSAO_SISTEMA"
    ADD CONSTRAINT "PERMISSAO_SISTEMA_pkey" PRIMARY KEY (co_sistema);
 V   ALTER TABLE ONLY public."PERMISSAO_SISTEMA" DROP CONSTRAINT "PERMISSAO_SISTEMA_pkey";
       public         postgres    false    197            �
           2606    84775    TIPO_USUARIO TIPO_USUARIO_pkey 
   CONSTRAINT     m   ALTER TABLE ONLY public."TIPO_USUARIO"
    ADD CONSTRAINT "TIPO_USUARIO_pkey" PRIMARY KEY (co_tipo_usuario);
 L   ALTER TABLE ONLY public."TIPO_USUARIO" DROP CONSTRAINT "TIPO_USUARIO_pkey";
       public         postgres    false    199            �
           2606    84817    CAO_CLIENTE cao_cliente_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public."CAO_CLIENTE"
    ADD CONSTRAINT cao_cliente_pkey PRIMARY KEY (co_cliente);
 H   ALTER TABLE ONLY public."CAO_CLIENTE" DROP CONSTRAINT cao_cliente_pkey;
       public         postgres    false    207            �
           2606    84818 %   CAO_FATURA CAO_FATURA_co_cliente_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."CAO_FATURA"
    ADD CONSTRAINT "CAO_FATURA_co_cliente_fkey" FOREIGN KEY (co_cliente) REFERENCES public."CAO_CLIENTE"(co_cliente);
 S   ALTER TABLE ONLY public."CAO_FATURA" DROP CONSTRAINT "CAO_FATURA_co_cliente_fkey";
       public       postgres    false    203    207    2724            �
           2606    84828     CAO_FATURA CAO_FATURA_co_os_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."CAO_FATURA"
    ADD CONSTRAINT "CAO_FATURA_co_os_fkey" FOREIGN KEY (co_os) REFERENCES public."CAO_OS"(co_os);
 N   ALTER TABLE ONLY public."CAO_FATURA" DROP CONSTRAINT "CAO_FATURA_co_os_fkey";
       public       postgres    false    203    205    2722            �
           2606    84823 %   CAO_FATURA CAO_FATURA_co_sistema_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."CAO_FATURA"
    ADD CONSTRAINT "CAO_FATURA_co_sistema_fkey" FOREIGN KEY (co_sistema) REFERENCES public."PERMISSAO_SISTEMA"(co_sistema);
 S   ALTER TABLE ONLY public."CAO_FATURA" DROP CONSTRAINT "CAO_FATURA_co_sistema_fkey";
       public       postgres    false    2714    197    203            �
           2606    92923 '   CAO_SALARIO CAO_SALARIO_co_sistema_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."CAO_SALARIO"
    ADD CONSTRAINT "CAO_SALARIO_co_sistema_fkey" FOREIGN KEY (co_sistema) REFERENCES public."PERMISSAO_SISTEMA"(co_sistema);
 U   ALTER TABLE ONLY public."CAO_SALARIO" DROP CONSTRAINT "CAO_SALARIO_co_sistema_fkey";
       public       postgres    false    209    197    2714            �
           2606    84789 8   PERMISSAO_SISTEMA PERMISSAO_SISTEMA_co_tipo_usuario_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."PERMISSAO_SISTEMA"
    ADD CONSTRAINT "PERMISSAO_SISTEMA_co_tipo_usuario_fkey" FOREIGN KEY (co_tipo_usuario) REFERENCES public."TIPO_USUARIO"(co_tipo_usuario);
 f   ALTER TABLE ONLY public."PERMISSAO_SISTEMA" DROP CONSTRAINT "PERMISSAO_SISTEMA_co_tipo_usuario_fkey";
       public       postgres    false    197    2716    199            �
           2606    84784 3   PERMISSAO_SISTEMA PERMISSAO_SISTEMA_co_usuario_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."PERMISSAO_SISTEMA"
    ADD CONSTRAINT "PERMISSAO_SISTEMA_co_usuario_fkey" FOREIGN KEY (co_usuario) REFERENCES public."CAO_USUARIO"(co_usuario);
 a   ALTER TABLE ONLY public."PERMISSAO_SISTEMA" DROP CONSTRAINT "PERMISSAO_SISTEMA_co_usuario_fkey";
       public       postgres    false    197    2718    201            1   !   x�3�,H-J�R@�)�9�)�(�\1z\\\ 6	l      -   1   x�3�4C=CKT�e�1�*g�3�*g�e�U����\� Yb�      /   =   x�3�420��54�54�46500�4�34�2���č��&8�M��Fh�F��c���� "�      3      x�3�4�4500�2�B �+F��� '�7      +   o   x�]�1�0Eg�>�^����p##'��vhN8o|z��G�nj&�+����C��?8�M^^)�.}�x��k[�KhS-�-�x�wm��ٵDG8��N#��8��~@�B-Q      '   +   x�3��4�4�2�F�F\�`�1�	�6�2��Ҧ\1z\\\ ���      )   #   x�3�L��+.�)�/�2�L��L�+I����� {��     